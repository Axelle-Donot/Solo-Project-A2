<?php
require_once File::getApp(array("lib", "Conf.php"));

class Model {
  /**
   * @var PDO
   */
  private static $pdo;

  private static function Init() {
    $hostname = Conf::getHostname();
    $database_name = Conf::getDatabase();
    $login = Conf::getLogin();
    $password = Conf::getPassword();

    try {
      self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name;charset=utf8", $login, $password);
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage(); // affiche un message d'erreur
      } else {
        echo "Une erreur est survenue <a href=\"\"> retour a la page d'accueil </a>";
      }
      die();
    }
  }

  public static function getPdo() {
    if (is_null(self::$pdo))
      Model::Init();
    return self::$pdo;
  }

  // -- CRUD Methods ---

  public static function selectAll() {
    $table_name = static::$object;
    $class_name = "Model" . ucfirst($table_name);
    $sql = "SELECT * FROM `proj__" . $table_name . "`;";
    try {
      $db = self::getPdo();
      $rep = $db->query($sql);
      $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
      $tab = $rep->fetchAll();
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage();
      }
      return false;
    }
    return $tab ?? false;
  }

  public static function select($primaryValue) {
    $table_name = static::$object;
    $class_name = "Model" . ucfirst($table_name);
    $pkey = static::$primary;

    $sql = "SELECT * FROM `proj__" . $table_name . "` WHERE `" . $pkey . "`=:tag;";
    try {
      $db = self::getPdo();
      $rep = $db->prepare($sql);
      $rep->execute(array("tag" => $primaryValue));
      $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
      $el = $rep->fetch();
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage();
      }
      return false;
    }

    return $el ?? false;
  }

  public static function delete($primaryValue) {
    $table_name = static::$object;
    $class_name = "Model" . ucfirst($table_name);
    $pkey = static::$primary;

    $sql = "DELETE FROM proj__" . $table_name . " WHERE " . $pkey . "=:tag";
    $db = self::getPdo();
    $rep = $db->prepare($sql);
    $rep->execute(array("tag" => $primaryValue));
  }

  public static function update($tab, $primaryValue): bool {
    $table_name = static::$object;
    $pkey = static::$primary;

    $amodif = "";
    foreach ($tab as $key => $value) {
      $amodif = $amodif . $key . " = :" . $key . ",";
    }

    $modif = rtrim($amodif, ",");

    $sql = "UPDATE proj__$table_name SET $modif WHERE $pkey =:$pkey";
    try {
      $db = self::getPdo();
      $rep = $db->prepare($sql);
      $tab[$pkey] = $primaryValue;
      $state = $rep->execute($tab);
    } catch (PDOException $e) {
      if (Conf::getDebug()) echo $e->getMessage();
      return false;
    }
    return $state;
  }

  public static function create($tab): bool {
    $table_name = static::$object;
    $attribut = "(";
    $valeurs = "(";

    foreach ($tab as $key => $value) {
      $attribut = $attribut . $key . " ,";
      $valeurs = $valeurs . " :" . $key . ",";
    }

    $attrib = rtrim($attribut, ",");
    $val = rtrim($valeurs, ",");
    $attrib = $attrib . ")";
    $val = $val . ")";

    $sql = "INSERT INTO proj__" . $table_name . $attrib . " VALUES " . $val;

    try {
      $db = self::getPdo();
      $rep = $db->prepare($sql);
      $state = $rep->execute($tab);
    } catch (PDOException $e) {
      if (Conf::getDebug()) echo $e->getMessage();
      return false;
    }
    return $state;
  }
}


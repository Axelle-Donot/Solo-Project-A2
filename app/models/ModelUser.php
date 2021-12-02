<?php
require_once File::getApp(array("models", "Model.php"));

class ModelUser extends Model {
  private $user_id;
  private $username;
  private $password;
  private $last_name;
  private $first_name;
  private $mail;
  private $phone;
  private $profile_photo_id;

  protected static $object = "user";
  protected static $primary = "user_id";

  public function __construct($data = NULL) {
    if (!is_null($data)) {
      foreach ($data as $key => $valeur)
        $this->set($key, $valeur);
    }
  }

  public static function create(array $data): bool {
    $password_hashed = Security::hacher($data[]);
    $sql = "INSERT INTO `proj__user` (`username`, `password`, `last_name`, `first_name`, `mail`) VALUES
(':username_tag', ':password_tag', ':lastname_tag', ':firstname_tag', ':mail_tag');";
    try {
      $req_prep = self::getPdo()->prepare($sql);
      $req_prep->execute(array("username_tag" => $data["username"]));
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return false;
  }

  public static function checkPassword(string $mail, string $password): bool {
    $password_hashed = Security::hacher($password);
    $sql = "SELECT COUNT(user_id) AS nbOfAccounts FROM `proj__user` WHERE `mail`=':mail_tag' AND `password`=':password_tag';";
    try {
      $req_prep = self::getPdo()->prepare($sql);
      $req_prep->execute(array("mail_tag" => $mail, "password_tag" => $password_hashed));
      $nbOfAccounts = $req_prep->fetch(PDO::FETCH_ASSOC)["nbOfAccounts"];
    } catch (PDOException $e) {
      if (Conf::getDebug()) echo $e->getMessage();
    }

    return ($nbOfAccounts ?? 0) == 1;
  }

  public static function getUserIdByMail(string $mail): string {
    $sql = "SELECT `user_id` FROM `proj__user` WHERE `mail`=':mail_tag';";
    try {
      $req_prep = self::getPdo()->prepare($sql);
      $req_prep->execute(array("mail_tag" => $mail));
      $user_id = $req_prep->fetch(PDO::FETCH_ASSOC)["user_id"];
    } catch (PDOException $e) {
      if (Conf::getDebug()) echo $e->getMessage();
    }
    return $user_id;
  }


  // --- GETTERS ---

  public function get($nom_attribut) {
    if (property_exists($this, $nom_attribut))
      return $this->$nom_attribut;
    return false;
  }

  // --- SETTERS ---

  public function set($nom_attribut, $valeur) {
    if (property_exists($this, $nom_attribut))
      $this->$nom_attribut = $valeur;
    return false;
  }

  public function __toString(): string {
    return "$this->username -> $this->first_name $this->last_name";
  }
}

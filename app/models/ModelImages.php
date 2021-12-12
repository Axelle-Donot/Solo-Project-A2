<?php
require_once File::getApp(array("models", "Model.php"));

class ModelImages extends Model {
  private $img_id;
  private $img_name;
  private $img_size;
  private $img_type;
  private $img_desc;
  private $img_blob;
  private static $default_image = "iVBORw0KGgoAAAANSUhEUgAAAEAAAABABAMAAABYR2ztAAAAIVBMVEXMzMyWlpbFxcWjo6O+vr63t7ecnJyqqqqbm5uxsbGampoKZyAaAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAU0lEQVRIiWNgGAWjYBQMd8Bk7KCITGMAZqeAQgZ2zwAwjQ2wmYU6ArVDaGyA0aWTkYHBFEpjM0FpoaABUzGExqaAJdmBkYFdNQBMj4JRMAoGOwAAPNIL2qWeApgAAAAASUVORK5CYII=";
  private static $default_type = "png";

  protected static $object = "images";
  protected static $primary = "img_id";

  public function __construct($data = NULL) {
    if (!is_null($data)) {
      foreach ($data as $key => $valeur)
        $this->set($key, $valeur);
    }
  }

  public static function getBlob($image_id): string {
    $sql = "SELECT `img_type`, `img_blob` FROM `proj__images` WHERE `img_id`=:img_id;";

    try {
      $req_prep = self::getPdo()->prepare($sql);
      $req_prep->execute(array("img_id" => $image_id));
      $array_res = $req_prep->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      if (Conf::getDebug()) echo $e->getMessage();
      die();
    }

    $type = empty($array_res["img_type"]) ? self::$default_type : $array_res["img_type"];
    $blob = empty($array_res['img_blob']) ? self::$default_image : base64_encode($array_res["img_blob"]);
    return "data:image/$type;base64,$blob";
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
}

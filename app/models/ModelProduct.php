<?php
require_once File::getApp(array("models", "Model.php"));
require_once File::getApp(array("models", "ModelImages.php"));
require_once File::getApp(array("models", "ModelDiscount.php"));
require_once File::getApp(array("models", "ModelTag.php"));

class ModelProduct extends Model {
  private $product_id;
  private $tag_id;
  private $discount_id;
  private $description;
  private $name;
  private $product_picture_id;
  private $price;
  private $rating;

  protected static $object = "product";
  protected static $primary = "product_id";

  public function __construct($data = NULL) {
    if (!is_null($data)) {
      foreach ($data as $key => $valeur)
        $this->set($key, $valeur);
    }
  }

  public static function searchProduct(string $query) {
    $table_name = static::$object;
    $class_name = "Model" . ucfirst($table_name);
    $sql = "SELECT * FROM `proj__$table_name` WHERE `name` LIKE :search_tag;";
    try {
      $req_prep = self::getPdo()->prepare($sql);
      $state = $req_prep->execute(array(":search_tag" => '%' . $query . '%'));
      $tab = $req_prep->fetchAll(PDO::FETCH_CLASS, $class_name);
    } catch (PDOException $e) {
      if (Conf::getDebug()) echo $e->getMessage();
      return false;
    }
    if (!$state) return false;
    return $tab;
  }

  public function get($nom_attribut) {
    if (property_exists($this, $nom_attribut))
      return $this->$nom_attribut;
    return false;
  }

  public function getImage(): string {
    return ModelImages::getBlob($this->product_picture_id);
  }

  public function getPrixEffectif(): string {
    $discount = ModelDiscount::select($this->discount_id);
    if ($discount == false)
      return $this->price;
    if ($discount->isPercentage())
      return $this->price * ($discount->getReduction() / 100);
    else
      return $this->price - $discount->getReduction();
  }

  public function hasDiscount(): bool {
    return !is_null($this->discount_id);
  }

  public function set($nom_attribut, $valeur) {
    if (property_exists($this, $nom_attribut))
      $this->$nom_attribut = $valeur;
    return false;
  }

  public function __toString(): string {
    return "Produit $this->name";
  }
}
<?php
require_once File::getApp(array("models", "Model.php"));

class ModelDiscount extends Model {
  private $discount_id;
  private $reduction;
  private $is_percentage;

  protected static $object = "discount";
  protected static $primary = "discount_id";

  public function __construct($id = NULL, $reduction = NULL, $percentage = NULL) {
    if (!is_null($id) && !is_null($reduction) && !is_null($percentage)) {
      $this->discount_id = $id;
      $this->reduction = $reduction;
      $this->is_percentage = $percentage;
    }
  }

  // --- GETTERS ---
  public function getDiscountId() {
    return $this->discount_id;
  }

  public function getReduction(): int {
    return $this->reduction;
  }

  public function IsPercentage(): bool {
    return $this->is_percentage;
  }

  // --- SETTERS ---

  public function setDiscountId($id) {
    $this->discount_id = $id;
  }

  public function setPassword($reduction) {
    $this->reduction = $reduction;
  }

  public function setIsPercentage($percentage) {
    $this->is_percentage = $percentage;
  }

  public static function getReductionById($id) {
    $sql = "SELECT reduction from proj__discount WHERE discount_id=:id"; // Préparation de la requête
    $req_prep = Model::getPDO()->prepare($sql);

    $values = array(
      "id" => $id,
      //nomdutag => valeur, ...
    );
    // On donne les valeur s et on exécute la requête     
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelDiscount');
    $tab_red = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_red))
      return false;
    return $tab_red[0];
  }
}

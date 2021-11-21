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

  public function getReduction() {
    return $this->reduction;
  }

  public function getIsPercentage() {
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
}

<?php
require_once File::getApp(array("models", "Model.php"));

class ModelCart_item extends Model {
  private $cart_id;
  private $product_id;
  private $quantity;

  protected static $object = "cart_item";
  protected static $primary = "cart_id";

  public function __construct($id = NULL, $pid = NULL, $quantity = NULL) {
    if (!is_null($id) && !is_null($pid) && !is_null($quantity)) {
      $this->cart_id = $id;
      $this->product_id = $pid;
      $this->quantity = $quantity;
    }
  }

  // --- GETTERS ---

  public function getCartId() {
    return $this->cart_id;
  }

  public function getProductId() {
    return $this->product_id;
  }

  public function getQuantity() {
    return $this->quantity;
  }

  // --- SETTERS ---

  public function setCartId($id) {
    $this->cart_id = $id;
  }

  public function setProductId($pid) {
    $this->product_id = $pid;
  }

  public function setQuantity($quantity) {
    $this->quantity = $quantity;
  }
}

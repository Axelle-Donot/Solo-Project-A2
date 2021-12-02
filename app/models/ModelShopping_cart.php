<?php
require_once File::getApp(array("models", "Model.php"));

class ModelShopping_cart extends Model {
  private $cart_id;
  private $customer_id;
  private $total_price;

  protected static $object = "shopping_Cart";
  protected static $primary = "cart_id";

  public function __construct($data = NULL) {
    if (!is_null($data)) {
      foreach ($data as $key => $valeur)
        $this->set($key, $valeur);
    }
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
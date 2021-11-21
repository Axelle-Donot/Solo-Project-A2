<?php
require_once File::getApp(array("models", "Model.php"));

class Ordered_product extends Model {
  private $ordered_id;
  private $customer_id;
  private $date;
  private $total_price;

  protected static $object = "ordered_product";
  protected static $primary = "ordered_id";

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

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

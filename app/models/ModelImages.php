<?php
require_once File::getApp(array("models","Model.php"));

class ModelImages extends Model {
	private $img_id;
	private $img_name;
	private $img_size;
	private $img_type;
	private $img_desc;
	private $img_blob;

	protected static $object = "images";
	protected static $primary = "img_id";

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

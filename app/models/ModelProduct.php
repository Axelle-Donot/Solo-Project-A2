<?php
require_once File::getApp(array("models", "Model.php"));
require_once File::getApp(array("models", "ModelImages.php"));

class ModelProduct extends Model
{
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

    public function __construct($data = NULL)
    {
        if (!is_null($data)) {
            foreach ($data as $key => $valeur)
                $this->set($key, $valeur);
        }
    }

    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function getImage(): string
    {
        return ModelImages::getBlob($this->product_picture_id);
    }

    public function set($nom_attribut, $valeur)
    {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    public function __toString(): string
    {
        return "Produit $this->name";
    }
}

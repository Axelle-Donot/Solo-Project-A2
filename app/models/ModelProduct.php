<?php

require_once File::getApp(array("models","Model.php"));


class ModelProduct {

	private $product_id;
	private $tag_id;
	private $discount_id;
	private $description;
	private $name;
	private $product_picture_id;
	private $price;
	private $rating;

	public function getProductId() {
		return $this->product_id;
	}

	public function getTagId() {
		return $this->tag_id;
	}

	public function getDiscountId() {
		return $this->discount_id;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getName() {
		return $this->name;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getproductPictureId() {
		return $this->product_picture_id;
	}

	public function getRating() {
		return $this->rating;
	}

	public function setProductId($id) {
		$this->product_id = $id;
	}

	public function setTagId($tag) {
		$this->tag_id = $tag;
	}

	public function setDiscountId($discount) {
		$this->discount_id = $discount;
	}

	public function setDescription($desc) {
		$this->description = $desc;
	}

	public function setproductPictureId($image) {
		$this->product_picture_id = $image;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

	public function setRating($rate) {
		$this->rating = $rate;
	}

	public function __construct($id, $tag = NULL, $discount = NULL, $name , $desc = NULL, $picture = NULL, $price, $rating = NULL) {
		if (!is_null ($id) && !is_null($name) && !is_null($price)) { 
			$this->product_id = $id;
			$this->tag_id = $tag;
			$this->discount_id = $discount;
			$this->description = $desc;
			$this->name = $name;
			$this->product_picture_id = $picture;
			$this->price = $price;
			$this->rating = $rate;
		}	
	}

	 
	public function afficher() {
  		echo "<p> Produit $this->name </p>";
  	}

	//public static function getAllProducts(){
    //	$rep = Model::getPDO()->query('SELECT * FROM proj__product');
    //	$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduct');
    //	$tab_prod= $rep->fetchAll();
    //	return $tab_prod;
  //}


  public static function getAllProducts() {
        try {
            $rep = Model::getPDO()->query('SELECT * FROM proj__product');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduct');
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e->getMessage(); // affiche un message d'erreur
            else
                echo 'Une erreur est survenue';
            die();
        }
        return $rep->fetchAll();
    }

    public static function test(){
    	$sth = Model::getPDO()->prepare("SELECT * FROM proj__product");
		$sth->execute();

		/* Récupération de toutes les lignes d'un jeu de résultats */
		print("Récupération de toutes les lignes d'un jeu de résultats :\n");
		$result = $sth->fetchAll();
		print_r($result);
    }
}

?>

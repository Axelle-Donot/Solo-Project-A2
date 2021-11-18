<?php

require_once File::getApp(array("models","Model.php"));


class ModelProduct {

	private $product_id;
	private $tag_id;
	private $discount_id;
	private $name;
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

	public function getName() {
		return $this->name;
	}

	public function getPrice() {
		return $this->price;
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

	public function setName($name) {
		$this->name = $name;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

	public function setRating($rate) {
		$this->rating = $rate;
	}

	public function __construct($id, $tag = NULL, $discount = NULL, $name, $price, $rating = NULL) {
		$this->product_id = $id;
		$this->tag_id = $tag;
		$this->discount_id = $discount;
		$this->name = $name;
		$this->price = $price;
		$this->rating = $rate;
	}
}

?>

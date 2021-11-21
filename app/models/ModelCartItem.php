<?php

require_once File::getApp("models","Model.php");


class ModelCartItem {

	private $cart_id;
	private $product_id;
	private $quantity;
	
	public function getCartId() {
		return $this->cart_id;
	}

	public function getProductId() {
		return $this->product_id;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	public function setCartId($id) {
		$this->cart_id = $id;
	}

	public function setProductId($pid) {
		$this->product_id = $pid;
	}

	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	public function __construct($id, $pid, $quantity) {
		$this->cart_id = $id;
		$this->product_id = $pid;
		$this->quantity = $quantity;
	}
}

?>
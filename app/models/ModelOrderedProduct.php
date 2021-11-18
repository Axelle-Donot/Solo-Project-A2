<?php

require_once File::getApp(array("models","Model.php"));


class OrderedProduct {

	private $ordered_id;
	private $customer_id;
	private $date;
	private $total_price;

	public function getOrderedId() {
		return $this->ordered_id;
	}

	public function getCustomerId() {
		return $this->customer_id;
	}

	public function getDate() {
		return $this->date;
	}

	public function getTotalPrice() {
		return $this->total_price;
	}

	public function setOrderedId($id) {
		$this->ordered_id = $id;
	}

	public function setCustomerId($id) {
		$this->customer_id = $id;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function setTotalPrice($price) {
		$this->total_price = $price;
	}

	public function __construct($idO, $idC, $date, $price) {
		$this->ordered_id = $idO;
		$this->customer_id = $idC;
		$this->date = $date;
		$this->total_price = $price;
	}
}

?>

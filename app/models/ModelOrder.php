<?php

require_once File::getApp(array("models","Model.php"));


class ModelOrder {

	private $order_id;
	private $customer_id;
	private $date;
	private $total_price;


	public function getOrderId() {
		return $this->order_id;
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

	public function setOrderId($id) {
		$this->Order_id = $id;
	}

	public function setCustomerId($custId) {
		$this->customer_id = $custId;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function setTotalPrice($price) {
		$this->total_price = $price;
	}

	public function __construct($id, $custId, $date, $price) {
		$this->Order_id = $id;
		$this->customer_id = $custId;
		$this->date = $date;
		$this->total_price = $price;
	}
}

?>

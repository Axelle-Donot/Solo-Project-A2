<?php

require_once File::getApp(array("models","Model.php"));

class ModelDiscount {

	private $discount_id;
	private $reduction;
	private $is_percentage;

	public function getDiscountId() {
		return $this->discount_id;
	}

	public function getReduction() {
		return $this->reduction;
	}

	public function getIsPercentage() {
		return $this->is_percentage;
	}

	public function setDiscountId($id) {
		$this->discount_id = $id;
	}

	public function setPassword($reduction) {
		$this->reduction = $reduction;
	}

	public function setIsPercentage($percentage) {
		$this->is_percentage = $percentage;
	}

	public function __construct($id, $reduction, $percentage) {
		$this->discount_id = $id;
		$this->reduction = $reduction;
		$this->is_percentage = $percentage;
	}
}
?>
<?php

require_once File::getApp("models","Model.php");


class ModelAddress {

	private $address_id;
	private $user_id;
	private $street;
	private $city;
	private $state;
	private $zip_code;
	private $country;
	private $supplement;

	public function getAddressId() {
		return $this->address_id;
	}

	public function getUserId() {
		return $this->User_id;
	}

	public function getStreet() {
		return $this->Street;
	}

	public function getCity() {
		return $this->city;
	}

	public function getState() {
		return $this->state;
	}

	public function getZipCode() {
		return $this->zip_code;
	}

	public function getCountry() {
		return $this->country;
	}

	public function getsupplement() {
		return $this->supplement;
	}

	public function setAddressId($id) {
		$this->Address_id = $id;
	}

	public function setUserId($uid) {
		$this->user_id = $uid;
	}

	public function setStreet($street) {
		$this->street = $street;
	}

	public function setCity($city) {
		$this->city = $city;
	}

	public function setState($state) {
		$this->rating = $rate;
	}

	public function setZipCode($zip) {
		$this->zip_code = $zip;
	}

	public function setCountry($country) {
		$this->country = $country;
	}

	public function setSupplement($sup) {
		$this->supplement = $sup;
	}

	public function __construct($id, $uid, $street, $city, $state, $zip, $country, $sup) {
		$this->address_id = $id;
		$this->user_id = $uid;
		$this->street = $street;
		$this->city = $city;
		$this->state = $state;
		$this->zip_code = $zip;
		$this->country = $country;
		$this->supplement = $sup;
	}
}

?>

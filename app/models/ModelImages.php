<?php

require_once File::getApp("models","Model.php");


class ModelImages {

	private $img_id;
	private $img_name;
	private $img_size;
	private $img_type;
	private $img_desc;
	private $img_blob;
	

	public function getImgId() {
		return $this->img_id;
	}

	public function getImgName() {
		return $this->img_name;
	}

	public function getImgSize() {
		return $this->img_size;
	}

	public function getImgType() {
		return $this->img_type;
	}

	public function getImgDesc() {
		return $this->img_desc;
	}

	public function getImgBlob() {
		return $this->img_blob;
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

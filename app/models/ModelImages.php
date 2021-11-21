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

	public function setImgId($id) {
		$this->img_id = $id;
	}

	public function setImgName($name) {
		$this->img_name = $name;
	}

	public function setImgSize($size) {
		$this->img_size = $size;
	}

	public function setImgType($type) {
		$this->img_type = $type;
	}

	public function setImgDesc($desc) {
		$this->img_type = $id;
	}

	public function setImgBlob($blob) {
		$this->img_blob = $blob;
	}

	

	public function __construct($id, $name, $size, $type, $desc, $blob) {
		$this->img_id = $id;
		$this->img_name = $name;
		$this->img_size = $size;
		$this->img_type = $type;
		$this->img_desc = $desc;
		$this->img_blob = $blob;
	}
}

?>

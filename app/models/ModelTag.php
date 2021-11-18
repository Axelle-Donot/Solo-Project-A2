<?php

require_once File::getApp(array("models","Model.php"));


class ModelTag {

	private $tag_id;
	private $name;
	private $description;

	public function getTagId() {
		return $this->tag_id;
	}

	public function getName() {
		return $this->name;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setTagId($id) {
		$this->tag_id = $id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function __construct($id, $name, $description) {
		$this->tag_id = $id;
		$this->name = $name;
		$this->description = $description;
	}
}
?>
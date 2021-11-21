<?php
require_once File::getApp(array("models", "Model.php"));

class ModelTag extends Model {
  private $tag_id;
  private $name;
  private $description;

  protected static $object = "tag";
  protected static $primary = "tag_id";

  public function __construct($id = NULL, $name = NULL, $description = NULL) {
    if (!is_null($id) && !is_null($name) && !is_null($description)) {
      $this->tag_id = $id;
      $this->name = $name;
      $this->description = $description;
    }
  }

  // --- GETTERS ---

  public function getTagId() {
    return $this->tag_id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  // --- SETTERS ---

  public function setTagId($id) {
    $this->tag_id = $id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setDescription($description) {
    $this->description = $description;
  }
}

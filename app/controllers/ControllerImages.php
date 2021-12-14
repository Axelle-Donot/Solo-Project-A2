<?php
require_once File::getApp(array("models", "ModelImages.php"));

class ControllerImages {
  protected static $object = "images";

  public static function addImg($value) {
    ModelImages::create($value);
  }
}
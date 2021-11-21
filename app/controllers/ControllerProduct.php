<?php
require_once File::getApp(array("models", "ModelProduct.php"));

class ControllerProduct {
  protected static $object = "product";

  public static function readAll() {
    $page_title = 'Boutique';
    $view = 'list';
    $tab_prod = ModelProduct::selectAll();
    require(File::getApp(array("views", "view.php")));
  }
}

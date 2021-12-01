<?php
require_once File::getApp(array("models", "ModelShopping_cart.php"));

class ControllerShopping_cart {

  protected static $object = "shopping_cart";
  
  public static function readAll(){
    $prod = ModelShopping_cart::selectAll();   // demander à matéo pourquoi on peux pas changer le nom variable
    $page_title = "Votre panier";
    $view = "list.php";
    require File::getApp(array("views", "view.php"));
  }

}
?>
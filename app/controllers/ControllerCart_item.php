<?php
require_once File::getApp(array("models", "ModelCart_item.php"));

class ControllerCart_item {
  protected static $object = "cart_item";
  
  public static function ajout(){

    $prod = ModelProduct::ajoutProduitPanier($_GET['id']);

    if ($value){
      $page_title = 'Ajout du produit';
      $view = 'ajoutProduct';
      require(File::getApp(array("views", "view.php")));
    }else{
      $page_title = 'Error';
      $view = 'error';
      require(File::getApp(array("views", "view.php")));
    }
  }


}
?>
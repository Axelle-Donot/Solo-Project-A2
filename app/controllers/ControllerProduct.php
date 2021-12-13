<?php
require_once File::getApp(array("models", "ModelProduct.php"));

class ControllerProduct {
  protected static $object = "product";

  public static function readAll(){
    $page_title = 'Boutique';
    $view = 'list';
    $tab_prod = ModelProduct::selectAll();
    require File::getApp(array("views", "view.php"));
  }

  public static function read(){

    $value = ModelProduct::select($_GET['id']);

    if ($value){
      $page_title = 'Détail du produit';
      $view = 'detail';
      require(File::getApp(array("views", "view.php")));
    }else{
      $page_title = 'Détail du produit';
      $view = 'error';
      require(File::getApp(array("views", "view.php")));
    }
  }

  public static function create(){
    $page_title = 'Créer un produit';
    $view = 'create';
    require File::getApp(array("views","view.php"));
  }

  public static function created(){

    $value = array ("tag_id" => $_POST['tag'] , "discount_id" => $_POST['discount'] , "name" => $_POST['name'] , "description" => $_POST['description'], "price" => $_POST['price']);

    ModelProduct::create($value);
    ControllerProduct::readAll();
  }

  public static function delete(){
    ModelProduct::delete($_GET['id']);
    ControllerProduct::readAll();
  }

  public static function update(){

    $value = ModelProduct::select($_GET['id']);

    $page_title = 'Modifier un produit';
    $view = 'update';
    require File::getApp(array("views","view.php"));
  }

  public static function updated(){

    $tmpName = $_FILES['picture']["tmp_name"];
    $valueimg = array("img_name" => $_POST['name'], "img_size" => $_FILES['picture']["size"] ,"img_type" => $_FILES['picture']["type"], "img_blob" => file_get_contents($tmpName));
    $image = ControllerImages::addimg($valueimg);
    print_r($image);

    $value = array ( "tag_id" => $_POST['tag'] , "discount_id" => $_POST['discount'] , "name" => $_POST['name'] , "description" => $_POST['description'], "price" => $_POST['price'], "product_picture_id" => $image->get("img_id"));
    $id =  $_POST['id'];

    //$img = ($_FILES['img']);
    ModelProduct::update($value,$id);
    ControllerProduct::readAll();
  }
}
?>

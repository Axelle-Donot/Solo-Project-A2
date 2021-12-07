<?php
require_once File::getApp(array("models", "ModelCart_item.php"));

class ControllerCart extends Controller {
  protected static $object = "cart";

  public static function read() {
    if (Session::isConnected()) {
      $tab_items = ModelCart_item::getAllItems(ModelUser::getCartIdByUserId());
    } else {
      $tab_items = Session::getCartItems();
    }
    $page_title = "Votre panier";
    $view = "list";
    require_once File::getApp(array("views", "view.php"));
  }

  public static function add() {
    if (Session::isConnected()) {
      $prod = ModelCart_item::addProduct($_GET['id']);
    } else {
      Session::addProduct($_GET['id']);
    }
    header('Location: ?a=read&c=cart');
  }

  public static function delete() {
    if (Session::isConnected()) {
      //$prod = ModelCart_item::removeProduct($_GET['id']);
    } else {
      Session::removeProduct($_GET['id']);
    }
    header('Location: ?a=read&c=cart');
  }
}
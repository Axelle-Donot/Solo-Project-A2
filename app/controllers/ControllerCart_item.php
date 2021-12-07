<?php
require_once File::getApp(array("models", "ModelCart_item.php"));
require_once File::getApp(array("models", "ModelProduct.php"));

class ControllerCart_item
{
    protected static $object = "cart_item";

    public static function add()
    {
        if (Session::isConnected()) {
            //Marche
            $prod = ModelCart_item::addProduct($_GET['id']);
        } else {
            Session::addProduct($_GET['id']);
        }
        $tab_items = ModelCart_item::getAllItems(ModelUser::getCartIdByUserId());
        $page_title = "Votre panier";
        $view = "list.php";
        require File::getApp(array("views", "view.php"));
    }

    public static function showCart(){
        if (Session::isConnected()) {
            $tab_items = ModelCart_item::getAllItems(ModelUser::getCartIdByUserId());
        } else {
            $tab_items = $_SESSION['cart'];
        }
        $page_title = "Votre panier";
        $view = "list.php";
        require File::getApp(array("views", "view.php"));
    }

}
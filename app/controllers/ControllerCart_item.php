<?php
require_once File::getApp(array("models", "ModelCart_item.php"));

class ControllerCart_item
{
    protected static $object = "cart_item";


    public static function add()
    {
        if(Session::isConnected()){
            $prod = ModelCart_item::addProduct($_GET['id']);
        }
        else{

        }
        $page_title = 'Ajout du produit';
        $view = 'ajoutProduct';
        require(File::getApp(array("views", "view.php")));

        $tab_prod = ModelCart_item::selectAll();
        $page_title = "Votre panier";
        $view = "list.php";
        require File::getApp(array("views", "view.php"));
    }
}
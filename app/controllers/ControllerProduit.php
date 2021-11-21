<?php
require_once File::getApp(array("models","ModelProduct.php")); //chargement du modèle

class ControllerProduit {
    private static $object = "product";

    public static function readAll() {
        $pagetitle = 'Boutique';
        $view = 'liste';
        $tab_prod = ModelProduct::getAllProducts();     //appel au model pour gerer la BD
        require File::getApp(array("views","view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        
    }

    public static function create(){
        
    }

    public static function created(){
        
    }

    public static function error(){
        
    }

    public static function delete(){
        
    }
}
?>
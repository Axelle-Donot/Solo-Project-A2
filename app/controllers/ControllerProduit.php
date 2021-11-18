<?php
require_once File::build_path(array("model","ModelVoiture.php")); //chargement du modèle

class ControllerProduit {
    private static $object = "product";

    public static function readAll() {
        $pagetitle = 'Boutique';
        $view = 'list';
        $tab_v = ModelProduit::getAllProduits();     //appel au model pour gerer la BD
        require File::build_path(array("views","view.php"));  //"redirige" vers la vue
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
<?php
require_once File::getApp(array("models","ModelUser.php")); //chargement du modèle

class ControllerUser {
    private static $object = "user";

    public static function readAll() {
        $pagetitle = 'Utilisateurs';
        $view = 'liste';
        $tab_user = ModelUser::getAllUsers();     //appel au model pour gerer la BD
        require (File::getApp(array("views","view.php")));  //"redirige" vers la vue
    }
}
?>
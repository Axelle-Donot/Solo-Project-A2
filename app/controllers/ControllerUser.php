<?php
require_once File::getApp(array("models", "ModelUser.php"));

class ControllerUser {
  protected static $object = "user";

  public static function readAll() {
    $page_title = 'Utilisateurs';
    $view = 'list';
    $tab_user = ModelUser::selectAll();
    require_once File::getApp(array("views", "view.php"));
  }

  public static function login() {
    $page_title = 'Connexion';
    $view = 'login';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function connected() {

  }

  public static function register() {
    $page_title = 'Inscription';
    $view = 'register';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function registered() {

    $value = array ( "first_name"=> $_POST['firstname'] ,"last_name" => $_POST['lastname'] , "username" => $_POST['username'] ,"phone"=> $_POST['phone'], "mail" => $_POST['mail'] , "password" => $_POST['password']);
    ModelUser::create($value);
  }

  public static function showCart() {
    $page_title = 'Votre panier';
    $view = 'cart';
    require_once File::getApp(array("views", "view.php"));
  }
}

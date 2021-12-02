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
    //ModelUser::create($_POST["username-login"], $_POST["password-login"]);
  }

  public static function showCart() {
    $page_title = 'Votre panier';
    $view = 'cart';
    require_once File::getApp(array("views", "view.php"));
  }
}

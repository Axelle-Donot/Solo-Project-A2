<?php

class ControllerHome extends Controller {
  protected static $object = "home";

  public static function home() {
    $page_title = 'Super Solo';
    $view = 'accueil';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function contact() {
    $page_title = 'Contact';
    $view = 'contact';
    require_once File::getApp(array("views", "view.php"));
  }

}

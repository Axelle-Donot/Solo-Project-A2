<?php

class ControllerHome {

  protected static $object = "home";

  public static function goHome() {
    $page_title = 'Super Solo';
    $view = 'accueil';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function goContact() {
    $page_title = 'Contact';
    $view = 'contact';
    require_once File::getApp(array("views","contact","contact.php"));
  }

}

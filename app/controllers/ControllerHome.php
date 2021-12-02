<?php

class ControllerHome {
  protected static $object = "home";

  public static function goHome() {
    $page_title = 'Super Solo';
    $view = 'accueil';
    require_once File::getApp(array("views", "view.php"));
  }

}

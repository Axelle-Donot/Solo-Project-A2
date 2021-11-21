<?php
require_once File::getApp(array("models", "ModelUser.php"));

class ControllerUser {
  protected static $object = "user";

  public static function readAll() {
    $page_title = 'Utilisateurs';
    $view = 'list';
    $tab_user = ModelUser::selectAll();
    require(File::getApp(array("views", "view.php")));
  }
}

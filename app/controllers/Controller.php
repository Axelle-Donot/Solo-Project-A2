<?php
require_once File::getApp(array("controllers", "ControllerProduct.php"));
require_once File::getApp(array("controllers", "ControllerUser.php"));
require_once File::getApp(array("controllers", "ControllerHome.php"));
require_once File::getApp(array("controllers", "ControllerCart.php"));
require_once File::getApp(array("controllers", "ControllerPayment.php"));

class Controller {
  protected static $object = "";

  public static function error(string $title, string $details): void {
    require File::getApp(array("views", "toast.php"));
  }
}
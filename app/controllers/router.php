<?php
require_once File::getApp(array("controllers", "ControllerProduct.php"));
require_once File::getApp(array("controllers", "ControllerUser.php"));
require_once File::getApp(array("controllers", "ControllerHome.php"));
require_once File::getApp(array("controllers", "ControllerCart_item.php"));
require_once File::getApp(array("controllers", "ControllerShopping_cart.php"));

$action = $_GET['a'] ?? "goHome";
$controller = $_GET['c'] ?? "home";
$controller_class = "Controller" . ucfirst($controller);

if (class_exists($controller_class)) {
  if (method_exists($controller_class, $action))
    $controller_class::$action();
  else {
    $pagetitle = "Erreur 404";
    $view = "error";
    require_once File::getApp(array("views", "view.php"));
  }

} else {
  $pagetitle = "Erreur 404";
  $view = "error";
  require_once File::getApp(array("views", "view.php"));
}

$_SESSION["isLogged"] = false;
$_SESSION["cart"] = array("1", "2", "3");
var_dump($_SESSION);
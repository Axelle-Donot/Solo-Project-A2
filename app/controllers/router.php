<?php

$action = $_GET['action'] ?? "readAll";
$controller = $_GET['controller'] ?? "produit";
$controller_class = "Controller" . ucfirst($controller);

if (class_exists($controller_class)) {
  if (method_exists($controller_class, $action))
    $controller_class::$action();
  else
    $controller_class::error();

} else {
  $pagetitle = "Erreur 404";
  $controller = "";
  $view = "error";
  require_once File::getApp(array("views", "view.php"));
}

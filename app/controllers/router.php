<?php

require_once File::getApp(array("controllers","ControllerProduit.php"));

if (isset($_GET['action'])){
    $action = $_GET['action'];
    if (in_array($action,get_class_methods('ControllerProduit'))){
        ControllerProduit::$action();
    }else {
        ControllerProduit::error();
    }
}else {
    ControllerProduit::readAll();
}

?>
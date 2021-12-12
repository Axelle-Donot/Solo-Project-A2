<?php
require_once '../app/lib/File.php';
require_once File::getApp(array("lib", "Security.php"));
require_once File::getApp(array("models", "Session.php"));
Session::initSession();
/*echo "<pre>";
var_dump($_SESSION);
echo "</pre>";*/
require_once File::getApp(array("controllers", "router.php"));
<?php
require_once '../app/lib/File.php';
require_once File::getApp(array("lib", "Security.php"));
session_start();
require_once File::getApp(array("controllers", "router.php"));

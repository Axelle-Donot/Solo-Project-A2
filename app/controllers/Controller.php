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

  public static function sendMail(string $from, string $to, string $subject, string $msg): bool {
    // To send HTML mail, the Content-type header must be set
    $headers = "MIME-Version: 1.0 \r\n";
    $headers .= 'Content-type: text/html; charset="utf-8" \r\n';
    $headers .= "To: $to \r\n";
    $headers .= "From: $from \r\n";
    $content = "<h1>$subject</h1><div>$msg</div>";
    return mail($to, $subject, $content, $headers);
  }
}
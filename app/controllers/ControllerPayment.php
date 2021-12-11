<?php

class ControllerPayment extends Controller
{
    protected static $object = "payment";

    public static function pay() {
        $page_title = "Formulaire de paiement";
        $view = "paymentForm";
        require_once File::getApp(array("views", "view.php"));
    }
}
<?php
require_once File::getApp(array("models", "ModelCart_item.php"));
require_once File::getApp(array("models", "ModelOrdered_product.php"));
class ControllerPayment extends Controller
{
    protected static $object = "payment";

    public static function pay()
    {
        if(Session::isConnected()){
            $user = Session::getUserId();
            $tab_items = ModelCart_item::getAllItems(ModelUser::getCartIdByUserId($user));
        }
        else {
            $tab_items = Session::getCartItems();
        }
        $page_title = "Formulaire de paiement";
        $view = "paymentForm";
        require_once File::getApp(array("views", "view.php"));
    }

    public static function ordered()
    {
        if(Session::isConnected()){
            $cart = ModelUser::getCartIdByUserId(Session::getUserId());
            ModelOrdered_product::add($cart, Session::getUserId());
            ControllerHome::home();
        }
        else {
            Session::drainCart();
            ControllerHome::home();
        }
    }
}
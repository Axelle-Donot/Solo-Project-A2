<?php
require_once File::getApp(array("models", "ModelCart_item.php"));
require_once File::getApp(array("models", "ModelOrdered_product.php"));

class ControllerPayment extends Controller {
  protected static $object = "payment";

  public static function pay() {
    if (Session::isConnected()) {
      $user = Session::getUserId();
      $tab_items = ModelCart_item::getAllItems(ModelUser::getCartIdByUserId($user));
    } else {
      $tab_items = Session::getCartItems();
    }
    $page_title = "Formulaire de paiement";
    $view = "paymentForm";
    require_once File::getApp(array("views", "view.php"));
  }

  public static function ordered() {
    if (Session::isConnected()) {
      $cart = ModelUser::getCartIdByUserId(Session::getUserId());
      $totalPrice = ModelOrdered_product::totalPrice($cart);
      ModelOrdered_product::add($cart, Session::getUserId());
      $user = ModelUser::select(Session::getUserId());
      // Envoi du mail au client
      self::sendMail($user->get('mail'), $user->get('mail'),
          "Achat chez Solo " . date('l jS \of F Y h:i:s A'),
          "Commande pour un prix total de <strong>$totalPrice&nbsp;€</strong>.");
    } else {
      if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $info = Session::getCartPaymentResult();
        // Envoi du mail au client
        self::sendMail($_POST['email'], $_POST['email'],
            "Achat chez Solo " . date('l jS \of F Y h:i:s A'),
            "Achat de {$info['nbItems']} pour un prix de <strong>{$info['totalPrice']}€</strong>.");
        Session::drainCart();
      }
    }
    header('Location: ?a=read&c=cart');
  }
}
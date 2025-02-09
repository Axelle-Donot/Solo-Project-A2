<?php

class Session {
  public static function initSession(): void {
    session_start();
    // création du tableau user
    if (!isset($_SESSION['user'])) {
      $_SESSION['user'] = array();

      // Création variable connexion user->isLogged
      if (!isset($_SESSION['user']['isLogged']))
        $_SESSION['user']['isLogged'] = false;
      // Création variable identification user->userId
      if (!isset($_SESSION['user']['userId']))
        $_SESSION['user']['userId'] = "";
      if (!isset($_SESSION['user']['isAdmin']))
        $_SESSION['user']['isAdmin'] = false;

    }
    // Création du tableau du panier
    if (!isset($_SESSION['cart'])) {
      //echo "création cart session<br>";
      $_SESSION['cart'] = array();
    }
  }

  public static function resetSession(): void {
    session_destroy();
    self::initSession();
  }

  /* --- Compte utilisateur --- */
  public static function isConnected(): bool {
    return $_SESSION['user']['isLogged'];
  }

  public static function changeToConnected(): void {
    $_SESSION['user']['isLogged'] = true;
  }

  public static function changeToDisconnected(): void {
    $_SESSION['user']['isLogged'] = false;
  }

  public static function getUserId(): string {
    return $_SESSION['user']['userId'];
  }

  public static function updateUserId(string $userId): void {
    $_SESSION['user']['userId'] = $userId;
  }

  public static function updateRole(string $role): void {
    if ($role == 'admin') {
      $_SESSION['user']['isAdmin'] = true;
    }
  }

  public static function isAdmin(): bool {
    return $_SESSION['user']['isAdmin'];
  }

  /* --- Panier --- */
  public static function getCartItems(): array {
    return $_SESSION['cart'];
  }

  public static function getCartPaymentResult(): array {
    $total_price = 0;
    $number_items = 0;
    foreach (self::getCartItems() as $item) {
      $p = ModelProduct::select($item['product_id']);
      $q = $item['quantity'];
      $number_items += 1;
      $total_price += $p->getPrixEffectif() * (int)$q;
    }
    return array("totalPrice" => $total_price, "nbItems" => $number_items);
  }

  public static function addProduct($product_id): void {
    $i = 0;
    $product_exist = false;
    foreach ($_SESSION['cart'] as $p) {
      $product_exist = array_search($product_id, $p);
      if ($product_exist != false) break; // Le produit a été trouvé
      $i++;
    }
    if ($product_exist == false) { // S'il n'existe pas déjà dans le panier
      $_SESSION['cart'][] = array(
        'product_id' => $product_id,
        'quantity' => 1);
    } else {
      $_SESSION['cart'][$i]['quantity']++;
    }
  }

  public static function removeProduct($product_id) {
    $i = 0;
    $product_exist = false;
    foreach ($_SESSION['cart'] as $p) {
      $product_exist = array_search($product_id, $p);
      if ($product_exist != false) break; // Le produit a été trouvé
      $i++;
    }
    if ($product_exist != false) {
      if ($_SESSION['cart'][$i]['quantity'] == 1)
        unset($_SESSION['cart'][$i]);
      else
        $_SESSION['cart'][$i]['quantity']--;
    }
  }

  public static function drainCart() {
    $_SESSION['cart'] = array();
  }
}
<?php
require_once File::getApp(array("models", "Model.php"));

class ModelCart_item extends Model {
  private $cart_id;
  private $product_id;
  private $quantity;

  protected static $object = "cart";
  protected static $primary = "cart_id";

  public function __construct($id = NULL, $pid = NULL, $quantity = NULL) {
    if (!is_null($id) && !is_null($pid) && !is_null($quantity)) {
      $this->cart_id = $id;
      $this->product_id = $pid;
      $this->quantity = $quantity;
    }
  }

  // --- GETTERS ---

  public function getCartId() {
    return $this->cart_id;
  }

  public function getProductId() {
    return $this->product_id;
  }

  public function getQuantity() {
    return $this->quantity;
  }

  // --- SETTERS ---

  public function setCartId($id) {
    $this->cart_id = $id;
  }

  public function setProductId($pid) {
    $this->product_id = $pid;
  }

  public static function getQuantityProduct($product_id): int {
    $sql = "SELECT quantity FROM proj__cart_item WHERE product_id=:p";
    try {
      $req_prep = self::getPdo()->prepare($sql);
      $state = $req_prep->execute(array("p" => $product_id));
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage();
      }
      return false;
    }
    $q = (int)$req_prep->fetch()['quantity'];
    return $q;
  }

  public static function alreadyInCart($product_id): bool {
    $sql = "SELECT * FROM proj__cart_item WHERE product_id =:p";
    try {
      $req_prep = self::getPdo()->prepare($sql);
      $state = $req_prep->execute(array("p" => $product_id));
      if ($state && $req_prep->rowCount() == 0) {
        return false;
      }
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage();
      }
      return false;
    }
    return true;
  }

  // On suppose que l'on peut modifier uniquement la quantité dans le panier et pas depuis le detail du produit
  public static function addProduct($primaryValue): bool {
    $inCart = self::alreadyInCart($primaryValue);
    // S'il est déjà dans le panier
    if ($inCart) {
      $sql = "UPDATE proj__cart_item SET quantity =:q WHERE cart_id =:c AND product_id =:p";
    } // S'il n'est pas dans le panier
    else {
      $sql = "INSERT INTO proj__cart_item VALUES (:c,:p,1)";
    }
    try {
      $req_prep = self::getPdo()->prepare($sql);
      if ($inCart) {
        $state = $req_prep->execute(array(
          "q" => ModelCart_item::getQuantityProduct($primaryValue) + 1,
          "c" => ModelUser::getCartIdByUserId(),
          "p" => $primaryValue
        ));
      } else {
        $state = $req_prep->execute(array(
          "c" => ModelUser::getCartIdByUserId(),
          "p" => $primaryValue
        ));
      }
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage();
      }
      return false;
    }
    return $state;
  }

  public static function getAllItems($cart): array {
    $sql = "SELECT product_id, quantity FROM proj__cart_item WHERE cart_id =:c";
    try {
      $req_prep = self::getPdo()->prepare($sql);
      $req_prep->execute(array("c" => $cart));
      $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelCart_item");
      $items = $req_prep->fetchAll();
    } catch (PDOException $e) {
      if (Conf::getDebug()) {
        echo $e->getMessage();
      }
      return false;
    }
    return $items;
  }

  public static function toStringItems($cart_id) {
    $items = self::getAllItems($cart_id);
    $product = array();
    $quantity = array();
    $cart = array($product, $quantity);

  }
}

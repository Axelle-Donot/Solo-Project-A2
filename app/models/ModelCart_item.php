<?php
require_once File::getApp(array("models", "Model.php"));

class ModelCart_item extends Model
{
    private $cart_id;
    private $product_id;
    private $quantity;

    protected static $object = "cart";
    protected static $primary = "cart_id";

    //ONE pour quantité 1 pour 1 idProduit
    const ONE = 0;
    //MORE pour plus d'une quantité pour 1 idProduit
    const MORE = 1;

    public function __construct($id = NULL, $pid = NULL, $quantity = NULL)
    {
        if (!is_null($id) && !is_null($pid) && !is_null($quantity)) {
            $this->cart_id = $id;
            $this->product_id = $pid;
            $this->quantity = $quantity;
        }
    }

    public function getCartId()
    {
        return $this->cart_id;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setCartId($id)
    {
        $this->cart_id = $id;
    }

    public function setProductId($pid)
    {
        $this->product_id = $pid;
    }

    public static function getQuantityProduct($product_id)
    {
        $sql = "SELECT quantity FROM proj__cart_item WHERE product_id =:p";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $req_prep->execute(array("p" => $product_id));
            //Requête valide et
            if ($req_prep->fetch(PDO::FETCH_OBJ) >= 1) {
                return $req_prep->fetch();
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            return false;
        }
        return 0;
    }

    public static function addProduct($product_id, $user_id)
    {
        $quantity = self::getQuantityProduct($product_id);
        // S'il est déjà dans le panier
        if ($quantity >= 1) {
            $sql = "UPDATE proj__cart_item SET quantity =:q WHERE cart_id =:c AND product_id =:p";
        }
        // S'il n'est pas dans le panier
        else if($quantity == 0){
            $sql = "INSERT INTO proj__cart_item VALUES (:c,:p,1)";
        }
        try {
            $req_prep = self::getPdo()->prepare($sql);
            if ($quantity >= 1) {
                $state = $req_prep->execute(array(
                    "q" => $quantity++,
                    "c" => ModelUser::getCartIdByUserId($user_id),
                    "p" => $product_id
                ));
            } else {
                $state = $req_prep->execute(array(
                    "c" => ModelUser::getCartIdByUserId($user_id),
                    "p" => $product_id
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

    public static function removeProduct($id, string $getUserId)
    {
        //Le produit id est présent dans le panier avec 1 quantité
        $quantity = self::getQuantityProduct($id);
        if ($quantity == 1) {
            $sql = "DELETE FROM proj__cart_item WHERE cart_id =:c AND product_id =:p";
        }
        //Le produit est id est présent dans le panier avec plus d'un en quantité
        else if($quantity > 1){
            $sql = "UPDATE proj__cart_item SET quantity =:q WHERE cart_id =:c AND product_id =:p";
        }
        try {
            $req_prep = self::getPdo()->prepare($sql);
            if($quantity > 1){
                $state = $req_prep->execute(array(
                    "q" => $quantity--,
                    "c" => ModelUser::getCartIdByUserId($getUserId),
                    "p" => $id
                ));
            }
            else {
                $state = $req_prep->execute(array(
                    "c" => ModelUser::getCartIdByUserId($getUserId),
                    "p" => $id
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

    public static function getAllItems($cart): array
    {
        $sql = "SELECT product_id, quantity FROM proj__cart_item WHERE cart_id=:c";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $req_prep->execute(array("c" => $cart));
            $items = $req_prep->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            return false;
        }
        return $items;
    }

}

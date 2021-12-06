<?php
require_once File::getApp(array("models", "Model.php"));

class ModelCart_item extends Model
{
    private $cart_id;
    private $product_id;
    private $quantity;

    protected static $object = "cart_item";
    protected static $primary = "cart_id";

    public function __construct($id = NULL, $pid = NULL, $quantity = NULL)
    {
        if (!is_null($id) && !is_null($pid) && !is_null($quantity)) {
            $this->cart_id = $id;
            $this->product_id = $pid;
            $this->quantity = $quantity;
        }
    }

    // --- GETTERS ---

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

    // --- SETTERS ---

    public function setCartId($id)
    {
        $this->cart_id = $id;
    }

    public function setProductId($pid)
    {
        $this->product_id = $pid;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public static function addProduct($primaryValue)
    {
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $pkey = static::$primary;//cart_id


        $sql = "INSERT INTO proj__" . $table_name . " VALUES (QUOI,:tag,1)";
        //$sql = "SELECT * FROM proj_produit";
        try {
            $db = self::getPdo();
            $rep = $db->prepare($sql);
            $rep->execute(array("tag" => $primaryValue));
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $el = $rep->fetch();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            return false;
        }
        return $el ?? false;
    }
}

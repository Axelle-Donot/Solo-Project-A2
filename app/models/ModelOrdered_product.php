<?php
require_once File::getApp(array("models", "Model.php"));

class ModelOrdered_product extends Model
{
    private $ordered_id;
    private $customer_id;
    private $date;
    private $total_price;

    protected static $object = "ordered_product";
    protected static $primary = "ordered_id";

    public function __construct($data = NULL)
    {
        if (!is_null($data)) {
            foreach ($data as $key => $valeur)
                $this->set($key, $valeur);
        }
    }

    // --- GETTERS ---

    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // --- SETTERS ---

    public function set($nom_attribut, $valeur)
    {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    public static function add($cart, $user)
    {
        $sql = "INSERT INTO proj__ordered_product VALUES (:o, :c, NOW(), :t)";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $state = $req_prep->execute(array(
                "o" => NULL,
                "c" => $user,
                "t" => self::totalPrice($cart)
            ));
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            return false;
        }
        self::drainCart($cart);
        return $state;
    }

    private static function totalPrice($cart)
    {
        $items = ModelCart_item::getAllItems($cart);
        foreach ($items as $key => $value) {
            $p = ModelProduct::select($value['product_id']);
            $q = htmlspecialchars($value['quantity']);
            $total_price += $p->get('price') * (int)$q;
        }
        return $total_price;
    }

    private static function drainCart($cart)
    {
        $sql = "DELETE FROM proj__cart_item WHERE cart_id =:c";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $state = $req_prep->execute(array(
                "c" => $cart,
            ));
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            return false;
        }
        return $state;
    }

    public static function getAllItems($user)
    {
        $sql = "SELECT * FROM proj__ordered_product WHERE customer_id =:c";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $state = $req_prep->execute(array(
                "c" => $user,
            ));
            $ordered = $req_prep->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            }
            return false;
        }
        return $ordered;
    }

    public function __toString(): string
    {
        return "Commande $this->ordered_id le $this->date au prix de $this->total_price €";
    }
}

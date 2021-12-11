<?php
require_once File::getApp(array("models", "Model.php"));

class ModelUser extends Model
{
    private $user_id;
    private $username;
    private $password;
    private $last_name;
    private $first_name;
    private $mail;
    private $phone;
    private $profile_photo_id;

    protected static $object = "user";
    protected static $primary = "user_id";

    public function __construct($data = NULL)
    {
        if (!is_null($data)) {
            foreach ($data as $key => $valeur)
                $this->set($key, $valeur);
        }
    }

    public static function create(array $data): bool
    {
        var_dump($data);
        $password_hashed = Security::hacher($data['password']);
        $sql = "INSERT INTO `proj__user` (`username`, `password`, `last_name`, `first_name`, `mail`) VALUES (:username_tag, :password_tag, :lastname_tag, :firstname_tag, :mail_tag);";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $state = $req_prep->execute(array(
                "lastname_tag" => $data["lastname"],
                "firstname_tag" => $data["firstname"],
                "username_tag" => $data["username"],
                "mail_tag" => $data["mail"],
                "password_tag" => $password_hashed
            ));
        } catch (PDOException $e) {
            if (Conf::getDebug()) echo $e->getMessage();
            return false;
        }
        return $state;
    }

    public static function checkPassword(string $mail, string $password): bool
    {
        $password_hashed = Security::hacher($password);
        $sql = "SELECT COUNT(user_id) AS nbOfAccounts FROM `proj__user` WHERE `mail`=:mail_tag AND `password`=:password_tag;";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $req_prep->execute(array("mail_tag" => $mail, "password_tag" => $password_hashed));
            $nbOfAccounts = $req_prep->fetch(PDO::FETCH_ASSOC)["nbOfAccounts"];
        } catch (PDOException $e) {
            if (Conf::getDebug()) echo $e->getMessage();
        }

        return ($nbOfAccounts ?? 0) == 1;
    }

    public static function getUserIdByMail(string $mail)
    {
        $sql = "SELECT `user_id` FROM `proj__user` WHERE `mail`=:mail_tag;";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $state = $req_prep->execute(array("mail_tag" => $mail));
            $userId = $req_prep->fetch(PDO::FETCH_ASSOC)['user_id'];
        } catch (PDOException $e) {
            if (Conf::getDebug()) echo $e->getMessage();
            return false;
        }
        if (!$state)
            return false;
        return $userId;
    }

    public static function getCartIdByUserId($user_id)
    {
        $sql = "SELECT cart_id FROM proj__user u JOIN proj__shopping_cart s ON u.user_id = s.customer_id WHERE user_id=:userid_tag;";
        try {
            $req_prep = self::getPdo()->prepare($sql);
            $state = $req_prep->execute(array("userid_tag" => $user_id));
            $cart_id = $req_prep->fetch(PDO::FETCH_ASSOC)['cart_id'];
        } catch (PDOException $e) {
            if (Conf::getDebug()) echo $e->getMessage();
            return false;
        }
        if (!$state)
            return false;
        return $cart_id;
    }

    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function getImage(): string
    {
        return ModelImages::getBlob($this->profile_photo_id);
    }

    public function getAdresse(): string
    {
        $sql = "";
        return "bla";
    }

    public function set($nom_attribut, $valeur)
    {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    public function __toString(): string
    {
        return "$this->username -> $this->first_name $this->last_name";
    }
}

<?php
require_once File::getApp(array("models", "ModelUser.php"));

class ControllerUser extends Controller {
  protected static $object = "user";

  public static function readAll(): void {
    $page_title = 'Utilisateurs';
    $view = 'list';
    $tab_user = ModelUser::selectAll();
    require_once File::getApp(array("views", "view.php"));
  }

  public static function login(): void {
    $page_title = 'Connexion';
    $view = 'login';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function connected(): void {
    if (isset($_POST["mail-login"], $_POST["password-login"])) {
      // On est sûr d'avoir un formulaire valide
      $mail = htmlspecialchars($_POST["mail-login"]);
      $password = htmlspecialchars($_POST["password-login"]);

      if (ModelUser::checkPassword($mail, $password)) {
        $_SESSION["isLogged"] = true;
        $_SESSION["user_id"] = ModelUser::getUserIdByMail($mail);
        ControllerHome::goHome();
      } else {
        self::login();
        parent::error('Connexion', 'Votre compte n\'existe pas');
      }
    } else {
      self::login();
      parent::error('Connexion', 'Formulaire de connexion invalide');
    }
  }

  public static function register(): void {
    $page_title = 'Inscription';
    $view = 'register';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function registered(): void {
    if (isset($_POST["lastname"], $_POST["firstname"], $_POST["username"], $_POST["mail"], $_POST["password"])) {
      if ($_POST["mail"] != $_POST["mail-conf"]) {
        self::register();
        parent::error('Inscription', 'Le mail de confirmation doit être le même que le mail.');
      } else if ($_POST["password"] != $_POST["password-conf"]) {
        self::register();
        parent::error('Inscription', 'Le mot de passe de confirmation doit être le même que le mot de passe.');
      }
      // On est sûr d'avoir un formulaire valide
      $lastname = htmlspecialchars($_POST["lastname"]);
      $firstname = htmlspecialchars($_POST["firstname"]);
      $username = htmlspecialchars($_POST["username"]);
      $mail = htmlspecialchars($_POST["mail"]);
      $password = htmlspecialchars($_POST["password"]);

      ModelUser::create($_POST["username-login"], $_POST["password-login"]);
      ControllerHome::goHome();
    } else {
      self::register();
      parent::error('Inscription', 'Formulaire d\'inscription invalide');
    }
  }

  public static function showCart(): void {
    $page_title = 'Votre panier';
    $view = 'cart';
    require_once File::getApp(array("views", "view.php"));
  }
}

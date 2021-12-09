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

  public static function profile(): void {
    if (!Session::isConnected())
      ControllerHome::home();
    else {
      $user = ModelUser::select(Session::getUserId());
      $page_title = "Profil utilisateur";
      $view = "profile";
      require_once File::getApp(array("views", "view.php"));
    }
  }

  public static function login(): void {
    if (Session::isConnected())
      ControllerHome::home();
    else {
      $page_title = 'Connexion';
      $view = 'login';
      require_once File::getApp(array("views", "view.php"));
    }
  }

  public static function connected(): void {
    if (Session::isConnected())
      ControllerHome::home();
    else if (isset($_POST["mail-login"], $_POST["password-login"])) {
      // On est sûr d'avoir un formulaire valide
      $mail = htmlspecialchars($_POST["mail-login"]);
      $password = htmlspecialchars($_POST["password-login"]);

      if (ModelUser::checkPassword($mail, $password)) {
        Session::changeToConnected();
        Session::updateUserId(ModelUser::getUserIdByMail($mail));
        ControllerHome::home();
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
    if (Session::isConnected())
      ControllerHome::home();
    else {
      $page_title = 'Inscription';
      $view = 'register';
      require_once File::getApp(array("views", "view.php"));
    }
  }

  public static function registered(): void {
    if (Session::isConnected())
      ControllerHome::home();
    else if (isset($_POST["lastname"], $_POST["firstname"], $_POST["username"], $_POST["mail"], $_POST["password"])) {
      // Validité de la confirmation du mdp
      if ($_POST["mail"] != $_POST["mail-conf"]) {
        self::register();
        parent::error('Inscription', "L'adresse mail de confirmation doit être le même que l'adresse mail.");
      } else if ($_POST["password"] != $_POST["password-conf"]) {
        self::register();
        parent::error('Inscription', "Le mot de passe de confirmation doit être le même que le mot de passe.");
      }
      // Validité de l'adresse mail
      if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        self::register();
        parent::error('Inscription', "L'adresse mail est invalide.");
      }
      // On est maintenant sûr d'avoir un formulaire valide
      $data = array(
        "lastname" => htmlspecialchars($_POST["lastname"]),
        "firstname" => htmlspecialchars($_POST["firstname"]),
        "username" => htmlspecialchars($_POST["username"]),
        "mail" => htmlspecialchars($_POST["mail"]),
        "password" => htmlspecialchars($_POST["password"])
      );
      if (ModelUser::create($data)) {
        Session::changeToConnected();
        echo ModelUser::getUserIdByMail($data['mail']);
        Session::updateUserId(ModelUser::getUserIdByMail($data['mail']));
        ControllerHome::home();
      } else {
        self::register();
        parent::error('Inscription', "Problème dans l'inscription.");
      }
    } else {
      self::register();
      parent::error('Inscription', "Formulaire d'inscription invalide");
    }
  }
}

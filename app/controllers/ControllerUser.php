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

  public static function read(): void {
    $id = $_GET['id'] ?? '';
    if (empty($id))
      ControllerHome::home();
    else {
      $user = ModelUser::select($id);
      $page_title = "Profil utilisateur";
      $view = "profile";
      require_once File::getApp(array("views", "view.php"));
    }
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
      header("Location: ?a=home");
    else if (isset($_POST["mail"], $_POST["password"])) {
      // On est sûr d'avoir un formulaire valide
      $mail = $_POST["mail"];
      $password = $_POST["password"];

      if (ModelUser::checkPassword($mail, $password)) {
        $user_id = ModelUser::getUserIdByMail($mail);
        if (ModelUser::isValidated($user_id)) {
          ModelUser::bindingUser2Session(ModelUser::getUserIdByMail($_POST['mail']));
          header("Location: ?a=home");
        } else {
          self::validationInfo();
        }
      } else {
        header("Location: ?a=login&c=user");
        parent::error('Connexion', 'Mail ou mot de passe invalide.');
      }
    } else {
      header("Location: ?a=login&c=user");
      parent::error('Connexion', 'Formulaire de connexion invalide');
    }
  }

  public static function disconnect(): void {
    if (Session::isConnected()) {
      Session::resetSession();
    }
    header("Location: ?a=home");

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
      header("Location: ?a=home");
    else if (isset($_POST["lastname"], $_POST["firstname"], $_POST["username"], $_POST["mail"], $_POST["password"])) {
      // Validité de la confirmation du mdp
      if ($_POST["mail"] != $_POST["mail-conf"]) {
        self::register();
        parent::error('Inscription', "L'adresse mail de confirmation doit être le même que l'adresse mail.");
        return;
      } else if ($_POST["password"] != $_POST["password-conf"]) {
        self::register();
        parent::error('Inscription', "Le mot de passe de confirmation doit être le même que le mot de passe.");
        return;
      }
      // Validité de l'adresse mail
      if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        self::register();
        parent::error('Inscription', "L'adresse mail est invalide.");
        return;
      }
      if (!ModelUser::isMailUnique($_POST["mail"]) || !ModelUser::isUsernameUnique($_POST["username"])) {
        self::register();
        parent::error('Inscription', "Mail ou nom d'utilisateur déjà existant(s).");
        return;
      }

      // On est maintenant sûr d'avoir un formulaire valide
      $data = array(
        "last_name" => $_POST["lastname"],
        "first_name" => $_POST["firstname"],
        "username" => $_POST["username"],
        "mail" => $_POST["mail"],
        "password" => $_POST["password"]
      );
      if (ModelUser::create($data)) {
        self::validationInfo();
      } else {
        self::register();
        parent::error('Inscription', "Problème dans l'inscription.");
      }
    } else {
      self::register();
      parent::error('Inscription', "Formulaire d'inscription invalide");
    }
  }

  public static function validationInfo(): void {
    // Redirection à l'accueil si l'on veut accéder alors que l'on est pas dans le processus de création/login
    if (!isset($_POST['mail'], $_POST['password']))
      header('Location: ?a=home');
    // Redirection à l'accueil si l'utilisateur est déjà validé
    if (ModelUser::isValidated(ModelUser::getUserIdByMail($_POST["mail"])))
      header("Location: ?a=home");

    $page_title = 'Validation par mail';
    $view = 'validationInfo';
    require_once File::getApp(array('views', 'view.php'));
  }

  public static function validate(): void {
    // Redirection à l'accueil si les var nécessaires n'existent pas
    if (!isset($_GET['mail'], $_GET['nonce']))
      header('Location: ?a=home');
    // Redirection à l'accueil si on est déjà connecté ou déjà validé
    if (Session::isConnected() || ModelUser::isValidated(ModelUser::getUserIdByMail($_GET['mail'])))
      header('Location: ?a=home');

    $res = ModelUser::validating(ModelUser::getUserIdByMail($_GET['mail']), $_GET['nonce']);
    // Si bien validé, on connecte la personne
    if ($res) {
      ModelUser::bindingUser2Session(ModelUser::getUserIdByMail($_GET['mail']));
    }
    $page_title = 'Validation par mail';
    $view = 'validationResult';
    require_once File::getApp(array('views', 'view.php'));
  }
}

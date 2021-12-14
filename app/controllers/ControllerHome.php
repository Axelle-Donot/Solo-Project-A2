<?php

class ControllerHome extends Controller {
  protected static $object = "home";

  public static function home(): void {
    $page_title = 'Accueil';
    $view = 'accueil';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function search(): void {
    if (!isset($_GET['q'])) {
      header('Location: ?a=home');
      return;
    }
    $tab_prod = ModelProduct::searchProduct($_GET['q']);
    $tab_user = ModelUser::searchUser($_GET['q']);
    $page_title = 'Recherche';
    $view = 'search';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function contact(): void {
    $page_title = 'Contact';
    $view = 'contact';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function envoiemail() {
    if (isset($_POST['objet'], $_POST['commentaireUser'])) {
      $sujet = $_POST['objet'];
      $contenu = $_POST['commentaireUser'];
      $mail = 'solo-admin@yopmail.com';
      if (self::sendMail($mail, $mail, $sujet, $contenu))
        self::error("Contact", "Bon envoi du mail contact.");
      else
        self::error("Contact", "Erreur dans l'envoi du mail.");
    }
    self::contact();
  }
}

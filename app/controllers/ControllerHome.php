<?php
require_once File::getApp(array('lib', "PHPMailer.php"));
require_once File::getApp(array('lib', "SMTP.php"));
require_once File::getApp(array('lib', "Exception.php"));


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerHome extends Controller {
  protected static $object = "home";

  public static function home() {
    $page_title = 'Super Solo';
    $view = 'accueil';
    require_once File::getApp(array("views", "view.php"));

  }

  public static function contact() {
    $page_title = 'Contact';
    $view = 'contact';
    require_once File::getApp(array("views", "view.php"));
  }

  public static function envoiemail() {
    $sujet = $_POST['objet'];
    $contenu = $_POST['commentaireUser'];

    // Create instance of PHPMailer
    $mail = new PHPMailer();
    // Set mailer to use smtp
    $mail->isSMTP();
    // Define smtp host
    $mail->Host = "smtp.gmail.com";
    // Enable smtp authentication
    $mail->SMTPAuth = true;
    // Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "tls";
    // Port to connect smtp
    $mail->Port = "587";
    // Set gmail username
    $mail->Username = "donotaxelle@gmail.com"; // email sender
    // Set gmail password
    $mail->Password = "Solosabre4"; // mdp email
    // Email subject
    $mail->Subject = $sujet;
    // Set sender email
    $mail->setFrom('osef@gmail.com'); // inutile, je n'ai pas trouvé où ça apparaissait dans le mail
    //// Enable HTML
    $mail->isHTML(true);
    // Attachment
    //$mail->addAttachment(''); // pièce jointe si besoin
    //// Email body
    $mail->Body = $contenu;
    // Add recipient
    $mail->addAddress('lkhclagclagcm@yopmail.com'); // email destination
    // Finally send email
    if ($mail->send()) {
      echo "Email Envoyé";
    } else {
      echo "Le message ne peut pas être envoyé";
    }
    // Closing smtp connection
    $mail->smtpClose();
    ControllerHome::goContact();
  }
}

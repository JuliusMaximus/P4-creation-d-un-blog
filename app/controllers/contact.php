<?php
class contact extends Controller {
  public function index() {
    $this->view( 'home/contact', [] );
  }

  public function contactMail() {

  	if (empty($_POST['name'])) {
	  $erreur = 'Nom manquant !';
	}
  	
	if (empty($_POST['email'])) {
	  $erreur = 'Adresse e-mail manquante !';
	}
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	  $erreur = 'Adresse e-mail invalide !';
	}
	  
	if (empty($_POST['message'])) {
	  $erreur = 'Message manquant !';
	}
	

	$message = '
    <h1> Nouveau message envoyé via votre formulaire de contact : </h1>
    <p>
      Nom : <b>' . $_POST['name'] . '</b><br>
    </p>
    <p>
      Email : <b>' . $_POST['email'] . '</b><br>
    </p>
    <p>
      Message : <b>' . $_POST['message'] . '</b><br>
    </p>
    ';

    mail_html('Nouveau message', $message);

    $validation = "Nouveau mot de passe envoyé !";
  }

  private function mail_html(string $subject, string $message) {
	$headers = 'From: <$_POST["email"]>' . "\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8';

    mail('contact@weckjulien.fr', $subject, $message, $headers);
}
}
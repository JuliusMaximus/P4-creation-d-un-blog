<?php
class contact extends Controller {
  public function index() {
    $this->view( 'home/contact', [] );
  }
  // Gestion du formulaire de contact
  // et envoie de l'email à l'administrateur
  public function mail_contact() {

    if ( !empty( $_POST ) ) {
      extract( $_POST );
      $erreur = [];
      $success = [];
      // Gestion des erreurs du formulaire
      if (empty($name)) {
        $erreur['name'] = 'Nom manquant !';
      }

      if ( empty( $email ) ) {
        $erreur['email'] = 'Adresse e-mail obligatoire';
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur['email'] = 'Adresse e-mail invalide !';
      }

      if (empty($message)) {
    	  $erreur['message'] = 'Message manquant !';
    	}

      if ( empty($erreur) ) { // aucune erreur -> envoie du mail à l'admin
        $success['mailSend']= 'Votre message a bien été envoyé !';
        
        $emailMessage = '
        <h3> Nouveau message envoyé depuis votre formulaire de contact : </h3>
        <p>
          Nom : <b>' . $name . '</b><br>
        </p>
        <p>
          Email : <b>' . $email . '</b><br>
        </p>
        <p>
          Message : <b>' . $message . '</b><br>
        </p>
        ';
        
        $headers = 'From: <' . $email .'>' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8';
       
        $destinataire = 'weckjulien@yahoo.fr';

        mail( $destinataire, 'Nouveau message', $emailMessage, $headers );
      }
      // Transmition des données à la vue
      $this->view( 'home/contact', ['erreur' => $erreur, 'success' => $success] );
	  } 
  }
}
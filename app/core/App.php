<?php
// Dispatcheur permettant de récupérer les contrôleurs et methodes
class App {
  // Controleur et method par defaut
  private $controller = 'home';
  private $method = 'index';
  private $params = [];

  public function __construct() {
    $route = $this->getParams();

    // On vérifie si le fichier du controlleur existe et on redéfinie
    // la valeur par defaut de $controller
    if ( file_exists( ROOT . 'app/controllers/' . $route[0] . '.php' ) ) {
      $this->controller = $route[0];
      unset ( $route[0] );
    }

    require_once ROOT . 'app/controllers/' . $this->controller . '.php';
    // On vérifie si la methode existe et on redéfinie
    // la valeur par defaut de $method
    if ( isset ( $route[1] ) ) {
      if ( method_exists( $this->controller, $route[1] ) ) {
        $this->method = $route[1];
        unset( $route[1] );
      }
    }

    $this->controller = new $this->controller;
    // On récupère les paramètres dans $params si il y en a
    $this->params = $route ? array_values( $route ) : [];
    // fonction de callback
    call_user_func_array( [ $this->controller, $this->method ], $this->params );
  }
  // Découpage de l'url
  private function getParams() {
    if ( isset( $_GET['route'] ) )
      return explode( '/', filter_var( rtrim( $_GET['route'], '/' ), FILTER_SANITIZE_URL ) );
  }
}

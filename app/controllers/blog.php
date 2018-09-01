<?php
class Blog extends Controller {
  public function index() { // Construction de la liste des articles
    $projects = DB::select( 'select * from project order by id desc' );
    // Formatage de la date et du retour à ligne
    foreach ( $projects as $key => $project ) {
      $date = date_create( $project['created_at'] );
      $projects[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      $projects[$key]['body'] = nl2br( $project['body'] );
    }
    // Transmition des données à la vue
    $this->view( 'home/blog', ['projects' => $projects] );
  }
    
}

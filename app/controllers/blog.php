<?php
class Blog extends Controller {
  public function index(int $page = 1) { // Construction de la liste des articles
     // pagination de la liste des commentaires
    $perPage = 3;
    $total = DB::selectAndCount( 'select id from project' ); // récupération du nombre de ligne
    $pagesTotal = ceil( $total/$perPage ); // calcule du nombre de page
    // définition de la page courante
    if( isset( $page ) && !empty( $page ) &&  $page > 0 &&  $page <= $pagesTotal ) {
      $currentPage =  $page;
    } else {
      $currentPage = 1;
    }
    // définition du premier commentaire de la page
    $start = ($currentPage - 1) * $perPage;
    // Récupération des commentaires suivant la page demandée
    $projects = DB::selectWithLimit( 'select * from project order by id desc limit :start, :perPage', $start, $perPage);
    // Formatage de la date et du retour à ligne
    foreach ( $projects as $key => $project ) {
      $date = date_create( $project['created_at'] );
      $projects[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      $projects[$key]['body'] = nl2br( $project['body'] );
    }
    // Transmition des données à la vue
    $this->view( 'home/blog', ['projects' => $projects, 'currentPage' => $currentPage, 'pagesTotal' => $pagesTotal] );
  }
    
}

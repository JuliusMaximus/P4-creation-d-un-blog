<?php
class Blog extends Controller {
  public function index() {
  	$id = isset($_GET['id']) ? $_GET['id'] : NULL;
    $projects = DB::select( 'select * from project order by id desc' );

   
    foreach ( $projects as $key => $project ) {
      $date = date_create( $project['created_at'] );
      $projects[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      $projects[$key]['body'] = nl2br( $project['body'] );
    }

    $this->view( 'home/blog', ['projects' => $projects] );
  }
  public function getURL() {
        return '/read?id=' . $this->id;
    }

    
}

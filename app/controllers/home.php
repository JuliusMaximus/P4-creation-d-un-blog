<?php
class Home extends Controller {
  public function index() {
  	$projects = DB::select('SELECT * FROM project ORDER BY id DESC LIMIT 1');

  	foreach ( $projects as $key => $project ) {
      $date = date_create( $project['created_at'] );
      $projects[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      $projects[$key]['body'] = nl2br( $project['body'] );
    }

    $this->view( 'home/index', ['projects' => $projects] );
  }
}

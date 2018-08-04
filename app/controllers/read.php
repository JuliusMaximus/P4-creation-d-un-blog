<?php
class Read extends Controller {
  public function blog() { 
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $parseUrl = parse_url($url);

  	$projects = DB::select( 'select * from project where id = ?', [htmlspecialchars($parseUrl['query'])]);

     foreach ( $projects as $key => $project ) {
      $date = date_create( $project['created_at'] );
      $projects[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      $projects[$key]['body'] = nl2br( $project['body'] );
    }
    
	$this->view( 'home/read', ['projects' => $projects] );
  }

}

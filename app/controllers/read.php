<?php
class Read extends Controller {
  public function blog( int $id ) { 

  	$projects = DB::select( 'select * from project where id = ?', [$id]);

     foreach ( $projects as $key => $project ) {
      $date = date_create( $project['created_at'] );
      $projects[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      $projects[$key]['body'] = nl2br( $project['body'] );
    }
    
	$this->view( 'home/read', ['projects' => $projects] );
  }

}

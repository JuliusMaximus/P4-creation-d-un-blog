<?php
class Read extends Controller {
  public function blog( int $id ) { 

  	$projects = DB::select( 'select * from project where id = ?', [$id]);

    foreach ( $projects as $key => $project ) {
      $date = date_create( $project['created_at'] );
      $projects[$key]['created_at'] = date_format( $date, 'd/m/Y' );
      $projects[$key]['body'] = nl2br( $project['body'] );
    }

    $comments = DB::select('select * from comments where id_project = ? order by id desc', [$id]);
    foreach ( $comments as $key => $comment ) {
      $date = date_create( $comment['created_at'] );
      $comments[$key]['created_at'] = date_format( $date, 'd/m/Y H:i' );
      $comments[$key]['comment'] = nl2br( $comment['comment'] );
    }

    if (!empty( $_POST )) {
      extract( $_POST );
      $erreur = [];

      if ( empty( $author ) ) {
        $erreur['author'] = 'Veuillez renseigner votre nom ou pseudo !';
      }
      if ( empty( $comment ) ) {
        $erreur['comment'] = 'Veuillez écrire un commentaire !';
      }

      if ( !$erreur ) {
        DB::insert('insert into comments (id_project, author, comment) values (:id_project, :author, :comment)', [
          'id_project' => $id,
          'author'     => htmlspecialchars($author),
          'comment'    => htmlspecialchars($comment)
        ]);

        header( 'Location: /read/blog/' . $id );
      }
      $this->view( 'home/read', ['erreur' => $erreur, 'projects' => $projects, 'comments' => $comments] );
    }

	$this->view( 'home/read', ['projects' => $projects, 'comments' => $comments] );
  }

}

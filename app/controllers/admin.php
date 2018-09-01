<?php
class Admin extends Controller {
  public function index( int $id = 1 ) {
    if ( !isset( $_SESSION['id'] ) ) {
      header( 'Location: /admin/connexion' );
    }

    $projects = DB::select( 'select * from project order by id desc' );

    if ( !empty( $_POST ) ) {
      extract( $_POST );
      $erreur = [];

      if ( empty( $title ) ) {
        $erreur['title'] = 'Titre obligatoire';
      }

      if ( empty( $resume ) ) {
        $erreur['resume'] = 'Texte obligatoire';
      }

      if ( empty( $body ) ) {
        $erreur['body'] = 'Texte obligatoire';
      }

      if ( isset( $_FILES['picture'] ) && $_FILES['picture']['error'] == 0 ) {
        if ( !in_array( $_FILES['picture']['type'], ['image/jpeg', 'image/png'] ) ) {
          $erreur['picture'] = 'Format incorrect (PNG et JPEG acceptés)';
        }
        elseif ( $_FILES['picture']['size'] > 1024000 ) {
          $erreur['picture'] = 'Image trop volumineuse (supérieure à 1Mo)';
        }
      }
      else {
        $erreur['picture'] = 'Image obligatoire';
      }

      if ( !$erreur ) {
        $extension = str_replace( 'image/', '', $_FILES['picture']['type'] );
        $name = bin2hex( random_bytes( 8 ) ) . '.' . $extension;

        if ( move_uploaded_file( $_FILES['picture']['tmp_name'], ROOT . 'public/img/imgArticles/' . $name ) ) {
          DB::insert( 'insert into project (title, resume, body, picture) values (:title, :resume, :body, :picture)', [
            'title'   => $title,
            'resume'  => $resume,
            'body'    => $body,
            'picture' => $name
          ] );

          header( 'Location: /admin' );
        }
        else {
          $erreur['picture'] = 'Erreur lors de l\'envoi du fichier';
        }
      }

      $this->view( 'admin/index', ['erreur' => $erreur, 'projects' => $projects] );
    }

    $perPage = 10;
    $total = DB::selectAndCount( 'select id from comments' );
    $pagesTotal = ceil( $total/$perPage );
    
    if( isset( $id ) && !empty( $id) &&  $id > 0 &&  $id <= $pagesTotal ) {
      $id = intval( $id );
      $currentPage =  $id;
    } else {
      $currentPage = 1;
    }

    $start = ($currentPage - 1) * $perPage;

    $comments = DB::select( 'select * from comments order by reported desc, id desc limit :start, :perpage', ['start' => $start, 'perpage' => $perPage]);

    var_dump($comments);
    
    foreach ( $comments as $key => $comment ) {
      $date = date_create( $comment['created_at'] );
      $comments[$key]['created_at'] = date_format( $date, 'd/m/Y H:i' );
      $comments[$key]['comment'] = nl2br( $comment['comment'] );
    }

    $this->view( 'admin/index', ['projects' => $projects, 'comments' => $comments, 'currentPage' => $currentPage, 'pagesTotal' => $pagesTotal] );
  }

  public function connexion() {
    if ( isset( $_SESSION['id'] ) ) {
      header( 'Location: /admin' );
    }

    if ( !empty( $_POST ) ) {
      extract( $_POST );

      $admin = $this->accountExists();

      if ( $admin ) {
        $_SESSION['id'] = $admin['id'];

        header( 'Location: /admin' );
      }
      else {
        $erreur = 'Identifiants erronés';
      }

      $this->view( 'admin/connexion', ['erreur' => $erreur] );
    }

    $this->view( 'admin/connexion' );
  }

  public function deconnexion() {
    if ( !isset( $_SESSION['id'] ) ) {
      header( 'Location: /admin/connexion' );
    }

    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
    }

    session_destroy();

    header( 'Location: /admin/connexion' );
  }

  public function supprimer( int $id ) {
    if ( !isset( $_SESSION['id'] ) ) {
      header( 'Location: /admin/connexion' );
    }

    $project = DB::select( 'select picture from project where id = ?', [$id] );

    unlink( ROOT . 'public/img/' . $project[0]['picture'] );

    DB::delete( 'delete from project where id = ?', [$id]);

    header( 'Location: /admin' );
  }

  public function editer( int $id ) {
    if ( !isset( $_SESSION['id'] ) ) {
      header( 'Location: /admin/connexion' );
    }

    $project = DB::select( 'select * from project where id = ?', [$id] );

    if ( !$project ) {
      header( 'Location: /admin' );
    }

    if ( !empty( $_POST ) ) {
      extract( $_POST );
      $erreur = [];

      if ( empty( $title ) ) {
        $erreur['title'] = 'Titre obligatoire';
      }

      if ( empty( $resume ) ) {
        $erreur['resume'] = 'Texte obligatoire';
      }

      if ( empty( $body ) ) {
        $erreur['body'] = 'Texte obligatoire';
      }

      if ( !$erreur ) {
        DB::update( 'update project set title = :title, resume = :resume, body = :body where id = :id', [
          'title'  => $title,
          'resume' => $resume,
          'body'   => $body,
          'id'     => $id
        ] );

        header( 'Location: /admin ');
      }
      else {
        $this->view( 'admin/editer', ['erreur' => $erreur, 'project' => $project[0]] );
      }
    }

    $this->view( 'admin/editer', ['project' => $project[0]] );
  }

  public function moderation( int $id ) {
    if ( !isset( $_SESSION['id'] ) ) {
      header( 'Location: /admin/connexion' );
    }

    $comment = DB::select( 'select * from comments where id = ?', [$id] );

    if ( !$comment ) {
      header( 'Location: /admin' );
    }

    if ( !empty( $_POST ) ) {
      extract( $_POST );
      $erreur = [];

      if ( empty( $comment ) ) {
        $erreur['comment'] = 'Commentaire obligatoire';
      }

      if ( !$erreur ) {
        DB::update( 'update comments set comment = :comment, reported = :reported where id = :id', [
          'comment'  => $comment,
          'reported' => 0,
          'id'       => $id
        ] );

        header( 'Location: /admin ');
      }
      else {
        $this->view( 'admin/moderation', ['erreur' => $erreur, 'comment' => $comment[0]] );
      }
    }

    $this->view( 'admin/moderation', ['comment' => $comment[0]] );
  }

  private function accountExists() : array {
    $admin = DB::select( 'select id, password from admin where login = ?', [$_POST['login']] );

    if ( $admin && password_verify( $_POST['password'], $admin[0]['password'] ) ) {
      return $admin[0];
    }
    else {
      return [];
    }
  }

  public function newPassword() {
    if ( !isset( $_SESSION['id'] ) ) {
          header( 'Location: /admin/connexion' );
    }

    if (!empty($_POST)) {
      extract($_POST);
      $erreur = [];
      $success = [];

      if (empty($oldpassword)) {
        $erreur['oldpassword'] = 'Ancien mot de passe manquant !';
      }
      elseif (!$this->password_ok()) {
        $erreur['oldpassword'] = 'Ancien mot de passe erroné !';
      }

      if (empty($newpassword)) {
        $erreur['newpassword'] = 'Nouveau mot de passe manquant !';
      }
      elseif (strlen($newpassword) < 8) {
        $erreur['newpassword'] = 'Nouveau mot de passe trop court. Min 8 caractères !';
      }
      if (empty($newpasswordconf)) {
        $erreur['newpasswordconf'] = 'confirmation du nouveau mot de passe manquante !';
      }
      elseif ($newpasswordconf != $newpassword) {
        $erreur['newpasswordconf'] = 'Confirmation du nouveau mot de passe différente !';
      }

      if (!$erreur) {
        $this->password_save();
        $success['validation'] = 'Nouveau mot de passe enregistré avec succès !';
      }   

      $this->view( 'admin/newpassword', ['erreur' => $erreur, 'success' => $success] );
    }

    $this->view( 'admin/newpassword' );
  }

  private function password_ok() : bool {
    $admin = DB::select('SELECT password FROM admin WHERE id = 1');

    if (password_verify($_POST['oldpassword'], $admin[0]['password'])) {
      return true;
    }

    else {
      return false;
    }
  }

  private function password_save(string $password = '', string $email = '') {
    $newpassword = $_POST['newpassword'] ?? $password;

    if (isset($email)) {
      // gestion oubli de mdp
      DB::update('UPDATE admin SET password = :password WHERE mail = :email', [
        'password' => password_hash($newpassword, PASSWORD_DEFAULT),
        'email'    => $email
      ]);
    }
    else {
      // gestion pour changement de mdp
      DB::update('UPDATE admin SET password = :password WHERE id = 1', [
        'password' => password_hash($newpassword, PASSWORD_DEFAULT)
      ]);
    }
  }
}

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700,300">
    <link rel="stylesheet" href="/css/admin.css">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-success">
      <div class="container">
        <a href="" class="navbar-brand">Jean Forteroche Administration</a>
      </div>
    </nav>
    <div class="container">
      <h1 class="text-xs-center">Connexion</h1>
      <div class="row">
        <div class="col-xl-4 col-xl-offset-4 col-md-6 col-md-offset-3">
          <?php if ( isset( $data['erreur'] ) ) : ?>
            <div class="alert alert-danger"><?= $data['erreur'] ?></div>
          <?php endif; ?>
          <form action="/admin/connexion" method="post" class="p-y-3 p-x-2" novalidate>
            <input type="text" name="login" class="form-control" placeholder="Login" value="<?php if ( isset( $_POST['login'] ) ) echo $_POST['login'] ?>">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            <input type="submit" class="btn btn-success" value="Connexion">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

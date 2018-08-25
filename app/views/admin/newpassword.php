<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Modification du mot de passe</title>
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700,300">
    <link rel="stylesheet" href="/css/admin.css">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-success">
      <div class="container">
        <a href="/admin" class="navbar-brand">Jean Forteroche Administration</a>
        <ul class="nav navbar-nav pull-xs-right">
          <li class="nav-item"><a class="nav-link" href="/" target="_blank">Aller sur le site</a></li>
          <li class="nav-item"><a class="nav-link" href="/admin/deconnexion">Déconnexion</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <h1 class="text-xs-center">Changer de mot de passe</h1>
      <div class="row justify-content-center">
        <div class="col-xl-4 col-xl-offset-4 col-md-6 col-md-offset-3">
          <?php if (isset($data['erreur']['oldpassword'])) : ?>
            <div class="alert alert-danger"><?= $data['erreur']['oldpassword'] ?></div>
          <?php endif; ?>
          <?php if (isset($data['erreur']['newpassword'])) : ?>
            <div class="alert alert-danger"><?= $data['erreur']['newpassword'] ?></div>
          <?php endif; ?>
          <?php if (isset($data['erreur']['newpasswordconf'])) : ?>
            <div class="alert alert-danger"><?= $data['erreur']['newpasswordconf'] ?></div>
          <?php endif; ?>
          <?php if (isset($data['success']['validation'])) : ?>
            <div class="alert alert-success"><?= $data['success']['validation'] ?></div>
          <?php endif; ?>
          <form action="/admin/newpassword" method="post" class="p-y-3 p-x-2" novalidate>
            <input type="password" name="oldpassword" class="form-control" placeholder="Ancien mot de passe">
            <input type="password" name="newpassword" class="form-control" placeholder="Nouveau mot de passe">
            <input type="password" name="newpasswordconf" class="form-control" placeholder="Confirmez le nouveau mot de passe">
            <input type="submit" class="btn btn-success" value="Changer de mot de passe">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

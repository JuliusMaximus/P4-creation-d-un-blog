<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Édition des publications</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700,300">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/tinymce/js/tinymce.min.js"></script>
    <script>tinymce.init({ 
      selector:'textarea', 
      plugins : "textcolor fullscreen",
      toolbar : "forecolor backcolor fullscreen",
      language: "fr_FR" });
    </script>
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
      <h1 class="text-xs-center">Publications</h1>
      <?php if ( isset( $data['erreur']['title'] ) ) : ?>
        <div class="alert alert-danger"><?= $data['erreur']['title'] ?></div>
      <?php endif; ?>
      <?php if ( isset( $data['erreur']['resume'] ) ) : ?>
        <div class="alert alert-danger"><?= $data['erreur']['resume'] ?></div>
      <?php endif; ?>
      <?php if ( isset( $data['erreur']['body'] ) ) : ?>
        <div class="alert alert-danger"><?= $data['erreur']['body'] ?></div>
      <?php endif; ?>
      <form action="" method="post" class="p-y-3 p-x-2" enctype="multipart/form-data" novalidate>
        <input type="text" name="title" class="form-control" placeholder="Nom du projet" value="<?= $data['project']['title'] ?>">
        <label for="name">Résumé de la publication :</label><textarea name="resume" class="form-control" placeholder="resumé de la publication"><?= $data['project']['resume'] ?></textarea>
        <label for="name">Texte de la publication :</label><textarea name="body" class="form-control" placeholder="Texte de la publication"><?= $data['project']['body'] ?></textarea>
        <input type="submit" class="btn btn-success" value="Éditer">
      </form>
    </div>
  </body>
</html>

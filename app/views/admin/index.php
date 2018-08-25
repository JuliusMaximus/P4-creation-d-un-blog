<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Gestion des publications</title>
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700,300">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
          <li class="nav-item"><a class="nav-link" href="/"  target="_blank">Aller sur le site</a></li>
          <li class="nav-item"><a class="nav-link" href="/admin/newpassword"  target="_blank">Modifier mot de passe</a></li>
          <li class="nav-item"><a class="nav-link" href="/admin/deconnexion">Déconnexion</a></li>
        </ul>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="accordion" id="menu">
        <div class="card">
          <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseComment" aria-expanded="true" aria-controls="collapseComment">
              <h2 class="text-xs-center h1">Commentaires</h2>
          </button>
          
          <div id="collapseComment" class="collapse show" aria-labelledby="headingComment" data-parent="#menu">
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID Publication</th>
                          <th>Date</th>
                          <th>Auteur</th>
                          <th>Commentaire</th>
                          <th>Modérer</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($data['comments'] as $key => $comment) :
                        ?>
                        <tr>
                          <th><?= $comment['id_project'] ?></th>
                          <td><?= $comment['created_at'] ?></td>
                          <td><?= $comment['author'] ?></td>
                          <td><?= $comment['comment'] ?></td>
                          <td><a href="/admin/moderation/<?= $comment['id'] ?>" class="text-success">Modérer</a></td>
                          <td>
                            <?php
                            if ( $comment['reported']) :
                            ?>
                            <i class="fas fa-exclamation-triangle alert alert-danger"></i>
                            <?php
                            endif;
                            ?>
                          </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                    <?php 
                    for( $i = 1;$i <= $data['pagesTotal'];$i++ ) {
                      if( $i == $data['currentPage'] ) {
                        echo $i . ' ';
                      } else {
                        echo '<a href="/admin/' . $i .'">' . $i . '</a>';
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapsePublication" aria-expanded="true" aria-controls="collapsePublication">
            <h2 class="text-xs-center h1">Publications</h2>
          </button>

          <div id="collapsePublication" class="collapse" aria-labelledby="headingPublication" data-parent="#menu">
            <div class="card-body">
             <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <?php if ( isset( $data['erreur']['title'] ) ) : ?>
                      <div class="alert alert-danger"><?= $data['erreur']['title'] ?></div>
                    <?php endif; ?>
                    <?php if ( isset( $data['erreur']['resume'] ) ) : ?>
                      <div class="alert alert-danger"><?= $data['erreur']['resume'] ?></div>
                    <?php endif; ?>
                    <?php if ( isset( $data['erreur']['body'] ) ) : ?>
                      <div class="alert alert-danger"><?= $data['erreur']['body'] ?></div>
                    <?php endif; ?>
                    <?php if ( isset( $data['erreur']['picture'] ) ) : ?>
                      <div class="alert alert-danger"><?= $data['erreur']['picture'] ?></div>
                    <?php endif; ?>
                    <form action="/admin" method="post" class="p-y-3 p-x-2" enctype="multipart/form-data" novalidate>
                      <input type="text" name="title" class="form-control" placeholder="Titre de la publication" value="<?php if ( isset( $_POST['title'] ) ) echo $_POST['title'] ?>">
                      <label for="name">Résumé de la publication :</label><textarea name="resume" class="form-control" placeholder="Résumé de la publication" value = "<?php if ( isset( $_POST['resume'] ) ) echo $_POST['resume'] ?>" ></textarea>
                      <label for="name">Texte de la publication :</label><textarea name="body" class="form-control" placeholder="Texte de la publication" value = "<?php if ( isset( $_POST['body'] ) ) echo $_POST['body'] ?>" ></textarea>
                      <label for="name">Photo :</label><input type="file" name="picture" class="form-control-file">
                      <input type="submit" class="btn btn-success" value="Publier">
                    </form>
                  </div>
                  <div class="col-md-6">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Titre</th>
                          <th>Éditer</th>
                          <th>Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($data['projects'] as $project) :
                        ?>
                        <tr>
                          <th><?= $project['id'] ?></th>
                          <td><?= $project['title'] ?></td>
                          <td><a href="/admin/editer/<?= $project['id'] ?>" class="text-success">Éditer</a></td>
                          <td><a href="/admin/supprimer/<?= $project['id'] ?>" class="text-success">Supprimer</a></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

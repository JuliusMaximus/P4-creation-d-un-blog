<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Le blog de Jean Forteroche, auteur et écrivain. Mon nouveau roman édité en ligne.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/css/blog.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
  <title>Le blog</title>
</head>
  <body>
    <header>
      <!-- inclusion du menu -->
      <?php include("nav.php"); ?>

      <div class="wrapper">
        <div class="content">
          <h1>Le Blog</h1>
          <p>"Billet simple pour l'Alaska"</p>
        </div>
      </div>
      
      <div class="drop-down">
        <div id="down"></div>
        <a href="#down"><i class="fas fa-angle-down fa-3x"></i></a>
      </div>

    </header>
    <div class="container">
      <div class="row mt-4">
        <?php
        foreach( $data['projects'] as $key => $project ) :
        ?>
        <div class="mt-4 p-4">
          <article>
            <h1 class="h3"><?= $project['title'] ?> <span class="text-muted lead"> Le <time><?= $project['created_at'] ?></time></span></h1>  
            <img class="img-fluid" src="/img/imgArticles/<?= $project['picture'] ?>" alt="<?= $project['picture'] ?>">
            <p class="lead text-justify"><?= $project['resume'] ?></p>
            <a href="/read/blog/<?= $project['id']; ?>" class="btn btn-primary float-right mt-3"><i class="fas fa-book-open"></i> Lire</a>
          </article>
        </div>
        <?php
        if( $key % 2 == 1 ) {
          echo '<div class="hidden-sm-down clearfix"></div>';
        }
        endforeach;
        ?>
      </div>
    </div>
    <hr>
    <!-- inclusion du footer -->
    <?php include("footer.php"); ?>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/js/blog.js"></script>
  </body>
</html>

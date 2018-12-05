<!-- Liste des articles du blog -->
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
    <header role="banner">
      <!-- inclusion du menu -->
      <?php include("nav.php"); ?>
      <!-- Photo pleine page -->
      <div class="wrapper">
        <div class="content">
          <div class="text-content">
            <h1>Le Blog</h1>
            <p>"Toujours aussi proche de ses lecteurs et à leur écoute, Jean Forteroche a décidé cette année de publier son livre directement en ligne, en offrant à ses fans un nouveau chapitre par semaine. Ne manquez donc pas le fil des aventures de ses personnages, et plongez dès à présent dans le monde du mystère et des découvertes !"</p>
          </div>
        </div>
      </div>
      <!-- Flèche avec effet smoothScroll -->
      <div class="drop-down">
        <div id="down"></div>
        <a href="#down" aria-label="Flêche vers le bas"><i class="fas fa-angle-down fa-3x"></i></a>
      </div>

    </header>
    <div class="container" role="main">
      <div class="row mt-4">
        <div id="list"></div>
        <!-- Récupération et construction des articles sur la page -->
        <?php
        foreach( $data['projects'] as $key => $project ) :
        ?>
        <div class="container mt-4 p-4">
          <article>
            <h2 class="h3"><?= $project['title'] ?> <span class="text-muted lead"> Le <?= $project['created_at'] ?></span></h2>  
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
      <!-- Construction des liens de pagination -->
      <div aria-label="Page publications">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="/blog/<?= $data['currentPage'] - 1 ?>#list" aria-label="Precedent">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Precedent</span>
            </a>
          </li>
          <?php 
          for( $i = 1;$i <= $data['pagesTotal'];$i++ ) :
          ?>
          <?php if ($i == $data['currentPage']) : ?>
          <li class="page-item active"><a class="page-link" href="/blog/<?= $i ?>#list"><?= $i ?></a></li>
          <?php else: ?>
          <li class="page-item"><a class="page-link" href="/blog/<?= $i ?>#list"><?= $i ?></a></li>
          <?php endif; ?>
          <?php
          endfor;
          ?>
          <li class="page-item">
            <a class="page-link" href="/blog/<?= $data['currentPage'] + 1 ?>#list" aria-label="suivant">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">suivant</span>
            </a>
          </li>
        </ul>
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

<!-- Page de l'article séléctionné -->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Le blog de Jean Forteroche, auteur et écrivain. Mon nouveau roman édité en ligne.">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/lecture.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<title>Le blog</title>
	</head>
	<body>
		
		<header role="banner">

			<!-- inclusion du menu -->
			<?php include("nav.php"); ?>

		</header>
		<section role="main">
			<h1>Billet simple pour l'Alaska</h1>
        	<p><a href="/blog">Retour à la liste des billets</a></p>	
			<div id="publication" class="row d-flex justify-content-center mb-5">
				<div id="barre-1"><div class="progression"></div><div class="pourcentage"></div></div>
				<!-- Récupération et Construction de l'article et ses commentaires -->
		        <?php
		         foreach( $data['projects'] as $key => $project ) :
		        ?>
		        <div class="col-md-8 mt-5 mb-5">
		        	<!-- Affichage des erreurs du formulaire -->
		        	<?php if ( isset( $data['erreur']['author'] ) ) : ?>
			            <div class="alert alert-danger"><?= $data['erreur']['author'] ?></div>
		            <?php endif; ?>
			        <?php if ( isset( $data['erreur']['comment'] ) ) : ?>
			            <div class="alert alert-danger"><?= $data['erreur']['comment'] ?></div>
			        <?php endif; ?>
			        <?php if ( isset( $data['success']['send'] ) ) : ?>
			            <div class="alert alert-success">
			            	<?= $data['success']['send'] ?>
			            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			            </div>
			        <?php endif; ?>
			        <article>
			            <h2 class="h3"><?= $project['title'] ?> <span class="text-muted lead"><?= $project['created_at'] ?></span></h2>
			            <img class="img-fluid" src="/img/imgArticles/<?= $project['picture'] ?>" alt="<?= $project['picture'] ?>">
			            <p class="lead text-justify"><?= $project['body'] ?></p>
			        </article>
		        </div>
		        <?php
		        if( $key % 2 == 1 ) {
		          echo '<div class="hidden-sm-down clearfix"></div>';
		        }
		        endforeach;
		        ?>
		    </div>
			<hr id="comments">
	        <div id="commentContainer" class="container">
	        	<div class="row justify-content-between">
	        		<div class="col-5 col-sm-5 col-md-4 col-lg-3 mt-5">
	        		  <h3 class="h4">Poster un commentaire</h3>
			          <form action="/read/insertComment/<?= $project['id'] ?>" method="post" class="p-y-3 p-x-2" novalidate role="form">
			            <input class="mb-3" type="text" name="author" class="form-control" aria-label="auteur" placeholder="Votre nom ou pseudo" value="<?php if ( isset( $_POST['author'] ) ) echo $_POST['author'] ?>">
			            <textarea class="mb-3" name="comment" class="form-control" aria-label="commentaire" placeholder="Votre commentaire" rows="3"></textarea><br>
			            <input type="submit" class="btn btn-primary" value="Envoyer">
			          </form>
			        </div>
		        	<div class="col-sm-6 col-md-8 col-lg-8 mt-5">
			        	<h3>Commentaires</h3>
				        <?php
				         foreach( $data['comments'] as $key => $comment ) :
				        ?>
				        <article>
				           <b><?= $comment['author'] ?></b> <span class="font-weight-light"> Le <?= $comment['created_at'] ?></span>&#32;<small><a href="/read/report/<?= $comment['id'] ?>/<?= $project['id'] ?>">Signaler</a></small>
				           <p class="lead text-justify"><?= $comment['comment'] ?></p>
				           <hr>
				        </article>
				        <?php
				        if( $key % 2 == 1 ) {
				          echo '<div class="hidden-sm-down clearfix"></div>';
				        }
				        endforeach;
				        ?>
				        <!-- Construction des liens de pagination -->
	                    <div aria-label="Page commentaires">
	                      <ul class="pagination">
	                        <li class="page-item">
	                          <a class="page-link" href="/read/blog/<?= $project['id'] ?>/<?= $data['currentPage'] - 1 ?>#comments" aria-label="Precedent">
	                            <span aria-hidden="true">&laquo;</span>
	                            <span class="sr-only">Precedent</span>
	                          </a>
	                        </li>
	                        <?php 
	                        for( $i = 1;$i <= $data['pagesTotal'];$i++ ) :
	                        ?>
	                        <?php if ($i == $data['currentPage']) : ?>
	                        <li class="page-item active"><a class="page-link" href="/read/blog/<?= $project['id'] ?>/<?= $i ?>#comments"><?= $i ?></a></li>
	                        <?php else: ?>
	                        <li class="page-item"><a class="page-link" href="/read/blog/<?= $project['id'] ?>/<?= $i ?>#comments"><?= $i ?></a></li>
	                        <?php endif; ?>
	                        <?php
	                        endfor;
	                        ?>
	                        <li class="page-item">
	                          <a class="page-link" href="/read/blog/<?= $project['id'] ?>/<?= $data['currentPage'] + 1 ?>#comments" aria-label="suivant">
	                            <span aria-hidden="true">&raquo;</span>
	                            <span class="sr-only">suivant</span>
	                          </a>
	                        </li>
	                      </ul>
	                    </div>
					</div>
		        </div>
	        </div>
		</section>
		<hr>
		
		<!-- inclusion du footer -->
		<?php include("footer.php"); ?>
		
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="/js/lecture.js"></script>
	</body>
</html>
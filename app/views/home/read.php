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
		
		<header>

			<!-- inclusion du menu -->
			<?php include("nav.php"); ?>

		</header>
		<section>
			<h1>Mon super blog !</h1>
	        <p><a href="/blog">Retour à la liste des billets</a></p>
			
			<div class="row d-flex justify-content-center">
		        <?php
		         foreach( $data['projects'] as $key => $project ) :
		        ?>
		        <div class="col-md-8">
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
		            <h1 class="h3"><?= $project['title'] ?> <span class="text-muted lead"> <time><?= $project['created_at'] ?></time></span></h1>
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
			<hr>
	        <div class="container">
	        	<div class="row">
	        		<div class="col-sm-6 col-md-4">
	        		  <h4>Poster un commentaire</h4>
			          <form action="/read/insertComment/<?= $project['id'] ?>" method="post" class="p-y-3 p-x-2" novalidate>
			            <input class="mb-3" type="text" name="author" class="form-control" placeholder="Votre nom ou pseudo" value="<?php if ( isset( $_POST['author'] ) ) echo $_POST['author'] ?>">
			            <textarea class="mb-3" type="text" name="comment" class="form-control" placeholder="Votre commentaire" rows="3"></textarea><br>
			            <input type="submit" class="btn btn-success" value="Envoyer">
			          </form>
			        </div>
		        	<div class="col-sm-6 col-md-8">
			        	<h3>Commentaires</h3>
				        <?php
				         foreach( $data['comments'] as $key => $comment ) :
				        ?>
				        <article>
				           <b><?= $comment['author'] ?></b> <span class="font-weight-light"> <time> Le <?= $comment['created_at'] ?></time></span>&#32;<small><a href="/read/report/<?= $comment['id'] ?>/<?= $project['id'] ?>">Signaler</a></small>
				           <p class="lead text-justify"><?= $comment['comment'] ?></p>
				           <hr>
				        </article>
				        <?php
				        if( $key % 2 == 1 ) {
				          echo '<div class="hidden-sm-down clearfix"></div>';
				        }
				        endforeach;
				        ?>
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
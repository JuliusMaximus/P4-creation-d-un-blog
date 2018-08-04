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
			
			<div class="row">
		        <?php
		         foreach( $data['projects'] as $key => $project ) :
		        ?>
		        <div class="col-md-6">
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

			<h2>Commentaires</h2>
			
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
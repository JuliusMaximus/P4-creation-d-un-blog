<!-- Page d'accueil du site -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Jean Forteroche, auteur et écrivain. je vous propose une autre façon de découvrir mes romans, qui sront diffusés en ligne et par épisodes.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/css/index.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
	<title>Le blog de Jean Forteroche</title>
</head>
<body>
	
	<header role="banner">

		<!-- inclusion du menu -->
		<?php include("nav.php"); ?>
		
		<!-- Photos pleine page -->
		<div class="wrapper">
			<div class="content">
				<h1>"Billet simple pour l'Alaska"</h1>
				<p>Un roman de Jean Forteroche !</p>
			</div>
		</div>
		<!-- Flêche avec effet smoothScroll -->
		<div class="drop-down">
			<div id="down"></div>
			<a href="#down" aria-label="Flêche vers le bas" ><i class="fas fa-angle-down fa-3x"></i></a>
		</div>

	</header>
	<!-- section recevant la dernière publication -->
	<section role="main">
		<div class="card text-center">
			<?php
	        foreach( $data['projects'] as $key => $project ) :
	        ?>
		  <div class="card-header">
		    <h2>Dernière publication</h2>
		  </div>
		  <div class="card-body">
		    <h3 class="card-title"><?= $project['title'] ?></h3>
		    <p class="card-text"><?= $project['resume'] ?></p>
		    <a href="/read/blog/<?= $project['id']; ?>" class="btn btn-primary"><i class="fas fa-book-open"></i> Lire</a>
		  </div>
		  <div class="card-footer">
		    <b>Le <?= $project['created_at'] ?></b>
		  </div>
		<?php endforeach;?>
		</div>
		
	</section role="complementary">
	<section id="paysage">
		<div class="wrapper">
			<div class="content">
				<h2 class="h1" role="complementary">"Découvrez une autre façon de lire et d'apprécier un roman..."</h2>
				<p class="blockquote-footer" role="complementary">Chapitre par chapitre... <cite title="Source Title">Jean F.</cite></p>
			</div>
		</div>
	</section>
	
	<!-- inclusion du footer -->
	<?php include("footer.php"); ?>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/js/index.js"></script>
</body>
</html>
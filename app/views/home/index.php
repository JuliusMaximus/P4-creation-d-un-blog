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
	
	<header>

		<!-- inclusion du menu -->
		<?php include("nav.php"); ?>
		

		<div class="wrapper">
			<div class="content">
				<h1>"Billet simple pour l'Alaska"</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique doloremque autem magni !</p>
			</div>
		</div>
		
		<div class="drop-down">
			<div id="down"></div>
			<a href="#down"><i class="fas fa-angle-down fa-3x"></i></a>
		</div>

	</header>
	<!-- section recevant la dernière publication -->
	<section>
		<div class="card text-center">
			<?php
	        foreach( $data['projects'] as $key => $project ) :
	        ?>
		  <div class="card-header">
		    <h2>Dernière publication</h2>
		  </div>
		  <div class="card-body">
		    <h5 class="card-title"><?= $project['title'] ?></h5>
		    <p class="card-text"><?= $project['resume'] ?></p>
		    <a href="/read/blog?<?= $project['id']; ?>" class="btn btn-primary"><i class="fas fa-book-open"></i> Lire</a>
		  </div>
		  <div class="card-footer text-muted">
		    Le <?= $project['created_at'] ?>
		  </div>
		<?php endforeach;?>
		</div>
		
	</section>
	<section id="paysage">
		<div class="wrapper">
			<div class="content">
				<h1>"Lorem ipsum dolor sit amet, consectetur adipisicing elit..."</h1>
				<p class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></p>
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
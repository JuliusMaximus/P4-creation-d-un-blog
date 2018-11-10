<!-- Formulaire de contact -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Jean Forteroche, auteur et écrivain. Découvrez mon parcours et mon univers.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/css/contact.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
	<title>Me contacter</title>
</head>
<body>
	
	<header role="banner">

		<!-- inclusion du menu -->
		<?php include("nav.php"); ?>
		
	</header>
	<div class="container" role="main">
		<h1 class="text-xs-center mt-5">Formulaire de contact</h1>
		<form action="/contact/mail_contact" method="post" class="mt-5 mb-5" role="form">
			<!-- Affichage des erreurs -->
		  <?php if ( isset( $data['erreur']['name'] ) ) : ?>
		    <div class="alert alert-danger"><?= $data['erreur']['name'] ?></div>
	      <?php endif; ?>
		  <?php if ( isset( $data['erreur']['email'] ) ) : ?>
	        <div class="alert alert-danger"><?= $data['erreur']['email'] ?></div>
	      <?php endif; ?>
	      <?php if ( isset( $data['erreur']['message'] ) ) : ?>
	        <div class="alert alert-danger"><?= $data['erreur']['message'] ?></div>
	      <?php endif; ?>
	      <?php if ( isset( $data['success']['mailSend'] ) ) : ?>
	        <div class="alert alert-success"><?= $data['success']['mailSend'] ?></div>
	      <?php endif; ?>		
		  <div class="form-group">
		  	<label for="name">Votre nom</label>
		    <input type="text" class="form-control" name="name" id="name" value="<?php if ( isset( $_POST['name'] ) ) echo $_POST['name'] ?>">
		    <label for="email">Votre Email</label>
		    <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com" value="<?php if ( isset( $_POST['email'] ) ) echo $_POST['email'] ?>">
		  </div>
		  <div class="form-group">
		    <label for="message">Votre message</label>
		    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
		</form>
	</div>
	<hr >
	
	<!-- inclusion du footer -->
	<?php include("footer.php"); ?>
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/js/about.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Jean Forteroche, auteur et écrivain. Découvrez mon parcours et mon univers.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<title>Me contacter</title>
</head>
<body>
	
	<header>

		<!-- inclusion du menu -->
		<?php include("nav.php"); ?>
		
	</header>
	<form class="mt-5 mb-5">
	<h1>Formulaire de contact</h1>
	  <div class="form-group">
	  	<label for="name">Votre nom</label>
	    <input type="text" class="form-control" id="name">
	    <label for="email">Votre Email</label>
	    <input type="email" class="form-control" id="email" placeholder="nom@exemple.com">
	  </div>
	  <div class="form-group">
	    <label for="message">Votre message</label>
	    <textarea class="form-control" id="message" rows="3"></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
	</form>
	<hr>
	
	<!-- inclusion du footer -->
	<?php include("footer.php"); ?>
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
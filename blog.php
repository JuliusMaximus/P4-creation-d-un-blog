<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Le blog de Jean Forteroche, auteur et écrivain. Mon nouveau roman édité en ligne.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/blog.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
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
	<section>
		<h2 id="down">Non est enim vitium in oratione solum, sed etiam in moribus.</h2>

		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duo Reges: constructio interrete. Nam ista vestra: Si gravis, brevis; Propter nos enim illam, non propter eam nosmet ipsos diligimus. Gracchum patrem non beatiorem fuisse quam fillum, cum alter stabilire rem publicam studuerit, alter evertere. Hoc loco tenere se Triarius non potuit. Quis est tam dissimile homini. </p>

		<?php

		// Connexion à la base de données

		try

		{

		    $bdd = new PDO('mysql:host=localhost;dbname=bdd_blog;charset=utf8', 'root', '');

		}

		catch(Exception $e)

		{

	        die('Erreur : '.$e->getMessage());

		}

		// On récupère les 5 derniers billets

		$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');


		while ($donnees = $req->fetch())

		{

		?>

		<div class="media">
		  <img class="align-self-center mr-3" src="img/aurora-small.jpg" alt="Generic placeholder image">
		  <div class="media-body">
		    <h5 class="mt-0">
		    	<?php echo htmlspecialchars($donnees['titre']); ?>

		        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
		    </h5>
		    <p> 
		    	<?php
			    // On affiche le contenu du billet
			    echo nl2br(htmlspecialchars($donnees['contenu']));
			    ?>
		    	<br />
	    	</p>
		    <a href="lecture_billet.php?billets=<?php echo $donnees['id']; ?>" class="btn btn-primary float-right mt-3"><i class="fas fa-book-open"></i> Lire</a>
		  </div>
		</div>

		<?php

		} // Fin de la boucle des billets

		$req->closeCursor();

		?>

	</section>
	<hr>
	
	<!-- inclusion du footer -->
	<?php include("footer.php"); ?>
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/blog.js"></script>
</body>
</html>
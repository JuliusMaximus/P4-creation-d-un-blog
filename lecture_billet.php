<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Le blog de Jean Forteroche, auteur et écrivain. Mon nouveau roman édité en ligne.">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/lecture.css">
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
        <p><a href="blog.php">Retour à la liste des billets</a></p>

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

		// Récupération du billet

		$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');

		$req->execute(array($_GET['billets']));

		$donnees = $req->fetch();

		?>


		<div class="news">
		    <h3>
		        <?php echo htmlspecialchars($donnees['titre']); ?>

		        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
		    </h3>		    
		    <p>
		    <?php

		    echo nl2br(htmlspecialchars($donnees['contenu']));

		    ?>
		    </p>
		</div>

		<h2>Commentaires</h2>

		<?php

		$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

		// Récupération des commentaires

		$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');

		$req->execute(array($_GET['billets']));

		while ($donnees = $req->fetch())

		{

		?>

		<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
		<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>

		<?php

		} // Fin de la boucle des commentaires

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
	<script src="js/lecture.js"></script>
</body>
</html>
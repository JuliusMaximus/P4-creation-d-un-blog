<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Page d'administration du blog de Jean Forteroche">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<title>page d'aministration</title>
	</head>
	<body>

		<?php

			// Le mot de passe n'a pas été envoyé ou n'est pas bon

			if (!isset($_POST['mot_de_passe']))

			{

			?>
				<div class="wrapper">
					<div class="content">
						<div class="card">
			  				<div class="card-body">
							    <h5 class="card-title">Connection Administration</h5>
							    <h6 class="card-subtitle mb-2 text-muted">Bonjour Jean !</h6>
							    <p class="card-text">Veuillez entrer le mot de passe pour accéder à la page d'administration :</p>
							    <form action="admin.php" method="post">

						            <p>

						            <input type="password" name="mot_de_passe" />

						            <input type="submit" value="Valider" />

						            </p>

						        </form>
							</div>
						</div>
					</div>
				</div>   	
		        
			<?php
			}
		

			elseif (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] != "test") 
			{
				?>
				
		        <div class="wrapper">
					<div class="content">
						<div class="card">
			  				<div class="card-body">
							    <h5 class="card-title">Connection Administration</h5>
							    <h6 class="card-subtitle mb-2 text-muted">Bonjour Jean !</h6>
							    <p class="card-text"><span>Le mot de passe saisi est incorrect !</span><br>Veuillez entrer à nouveau le mot de passe pour vous connecter :</p>
							    <form action="admin.php" method="post">

						            <p>

						            <input type="password" name="mot_de_passe" />

						            <input type="submit" value="Valider" />

						            </p>

						        </form>
							</div>
						</div>
					</div>
				</div>
				<?php
				
			}


			// Le mot de passe a été envoyé et il est bon

			else

			{
			?>
			    <p>Le mot de passe a été envoyé et il est bon</p>
			<?php
			}
		?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>
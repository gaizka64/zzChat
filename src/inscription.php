<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../static/css/css.css">
	<link href="../static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>ZZChat'</title>
</head>
	<body>
		<h1 class="centrer">ZZ'Chat</h1>
		<br />
		<h3 class="centrer">Inscription</h3>
		<form id="formulaire" action="./verif_inscription.php" method="post">
			<br />
			<input type="text" name="login" placeholder="Nom d'utilisateur"> <br>
			<br />
			<input type="password" name="pwd" placeholder="Mot de passe"> <br>
			<br />
			<input type="password" name="pwd2" placeholder="Confirmer le mot de passe"> <br>
			<br />
			<input type="submit" value="Inscription !">
			<br />
			<br />
		 	<?php
	 			if (isset($_GET["erreur"]) && ($_GET["erreur"] == 1 || $_GET["erreur"] == 2 || $_GET["erreur"] == 3))
	 			{
			?>
			<div class="alert alert-danger" role="alert">
			  	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  	<span class="sr-only">Erreur :</span>
				<?php
			 		if ($_GET["erreur"] == 1)
						echo "Tous les champs doivent être remplis.";

			 		else if ($_GET["erreur"] == 2)
						echo "Les mots de passes saisis ne sont pas identiques.";

					else if ($_GET["erreur"] == 3)
						echo "L'utilisateur existe déjà.";
				?>
			</div>
			<?php
				}
			?>
		</form>
	</body>
</html>

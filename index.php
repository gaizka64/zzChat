<?php
	// If a session is already opened then redirect to the chat (chat.php)
	if (!empty($_SESSION['login']))
	{
		header("Location: ./src/chat.php");
		exit;
	}
	else
	{
		$erreurTrouvee = false;

		// If the script verif_connexion.php sent an error number
		if (!empty($_GET["erreur"]))
		{
			$erreurTrouvee = true;

			switch($_GET["erreur"])
			{
				case 1:
					$messageErreur = 'Tous les champs doivent être remplis.';
					break;
				case 2:
					$messageErreur = 'Mot de passe incorrect.';
					break;
				case 3:
					$messageErreur = "L'utilisateur n'existe pas.";
					break;
				case 4:
					$messageErreur = 'Vous devez vous connecter pour accéder au chat.';
					break;
				default :
					$messageErreur = 'Une erreur inconnue est survenue.';
					break;
			}
		}
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./static/css/css.css">
		<link href="./static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title>ZZChat</title>
	</head>
	<body>
		<h1 class="centrer">ZZ'Chat</h1>
		<br />
		<h3 class="centrer">Connexion</h3>
		<form id="formulaire" action="./src/chat.php" method="post">
			<br />
			<input type="text" name="login" placeholder="Nom d'utilisateur">
			<br />
			<br />
			<input type="password" name="pwd" placeholder="Mot de passe">
			<br />
			<br />
			<input type="submit" value="Connexion">
			<br />
			<p class="blanc">
				Première connexion ?
				<a href="./src/inscription.php">Inscription</a>
			</p>
			<?php
				// If there is an error to print
				if ($erreurTrouvee)
				{
					echo '<div class="lert alert-danger" role="alert">';
		  			echo '	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
		  			echo '	<span class="sr-only">Erreur:</span>';
		  			echo "	$messageErreur";
					echo '</div>';
				}
			?>
		</form>
	</body>
</html>

<?php
	/* To activate error display during dev */
	ini_set('display_errors', true); 

	/* To initialise a session variable */
	session_start();

	/* If a Session variable is already set */
  	if (isset($_SESSION['login']) && !empty($_SESSION['login']))
  	{
   		header('Location: src/chat.php');
    	exit; 
  	}

  	/* If the script 'verif_connexion' sent an error number */
	if (isset($_GET["erreur"]) && ($_GET["erreur"] == 1 || $_GET["erreur"] == 2 || $_GET["erreur"] == 3))
	{
		$codeErreur = $_GET["erreur"];

		switch ($codeErreur) 
		{
	    case 1:
	        $messageErreur = "Tous les champs doivent être remplis.";
	        break;
	    case 2:
	    	$messageErreur = "Mot de passe incorrect.";
	        break;
	    case 3:
	        $messageErreur = "L'utilisateur n'existe pas.";
	        break;
	    case 4:
	    	$messageErreur = "Vous devez vous connecter pour accéder au t'chat.";
	    	break;
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="static/css/css.css">
		<link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title>ZZChat'</title>
	</head>
	<body>
		<h1 class="centrer">ZZ'Chat</h1>
		<br />
		<h3 class="centrer">Connexion</h3>

		<form id="formulaire" action="src/verif_connexion.php" method="post">
			<br />
			<input type="text" name="login" placeholder="Nom d'utilisateur">
			<br />
			<br />
			<input type="password" name="pwd" placeholder="Mot de passe">
			<br />
			<br />
			<input type="submit" value="Connexion">
			<br />
			<p class="blanc"> Première connexion ? <a href="src/inscription.php">Inscription</a></p>
			<?php 	
				if (isset($messageErreur)) 
				{
					echo '<div class="alert alert-danger" role="alert">';
		  			echo '	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
		  			echo '	<span class="sr-only">Erreur:</span>';
		  			echo "	$messageErreur";
					echo '</div>';
				}
			?>
		</form>
	</body>
</html>

 
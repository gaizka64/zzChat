<?php
<<<<<<< HEAD
	
=======
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1
	/* To activate error display during dev */
	ini_set('display_errors', true); 

	/* To initialise a session variable */
	session_start();
<<<<<<< HEAD
	if (!isset($_SESSION['lang']))
	{
		$_SESSION['lang'] = "fr";
	}

	include("src/fonctions.php");

	$traduction = recupTraduction($_SESSION['lang']);
=======
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1

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
<<<<<<< HEAD
	        $messageErreur = $traduction["1"];
	        break;
	    case 2:
	    	$messageErreur = $traduction["2"];
	        break;
	    case 3:
	        $messageErreur = $traduction["3"];
	        break;
	    case 4:
	    	$messageErreur = $traduction["4"];
=======
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
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1
	    	break;
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
<<<<<<< HEAD
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
=======
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1
		<link rel="stylesheet" type="text/css" href="static/css/css.css">
		<link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title>ZZChat'</title>
	</head>
	<body>
<<<<<<< HEAD
		<?php include_once("static/html/langues.html"); ?>
		<h1 class="centrer">ZZ'Chat</h1>
		<br />
		<h3 class="centrer"><?php echo $traduction["5"] ?></h3>

		<form id="formulaire" action="src/verif_connexion.php" method="post">
			<br />
			<input type="text" name="login" placeholder="<?php echo $traduction["8"] ?>">
			<br />
			<br />
			<input type="password" name="pwd" placeholder="<?php echo $traduction["9"] ?>">
			<br />
			<br />
			<input type="submit" value="<?php echo $traduction["10"] ?>">
			<br />
			<p class="blanc"><?php echo $traduction["6"] ?> <a href="src/inscription.php"><?php echo $traduction["7"] ?></a></p>
=======
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
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1
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

 
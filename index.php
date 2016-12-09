<?php
	
	/* To activate error display during dev */
	ini_set('display_errors', true); 

	/* To initialise a session variable */
	session_start();
	if (!isset($_SESSION['lang']))
	{
		$_SESSION['lang'] = "fr";
	}

	include("src/fonctions.php");

	$traduction = recupTraduction($_SESSION['lang']);

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
	    	break;
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="static/css/css.css">
		<link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title>ZZChat'</title>
	</head>
	<body>
		<h1 class="centrer">ZZ'Chat</h1>
		<h3 class="centrer"><?php include_once("static/html/langues.html"); ?></h3>
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

 
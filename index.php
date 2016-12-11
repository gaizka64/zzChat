<?php
	/* To initialise a session variable */
	session_start();

	/* If the naguage is not set */
	if (empty($_SESSION['lang']))
		$_SESSION['lang'] = 'fr';

	include("./src/fonctions.php");

	$traduction = recupTraduction($_SESSION['lang']);

	/* If a session variable is already set */
  	if (!empty($_SESSION['login']))
  	{
   		header("Location: ./src/chat.php");
    		exit;
  	}

	/* If the script 'verif_connexion' sent an error number */
	if (!empty($_GET['erreur']) && ($_GET['erreur'] == 1 || $_GET['erreur'] == 2 || $_GET['erreur'] == 3 || $_GET['erreur'] == 4))
	{
		$codeErreur = $_GET['erreur'];

		switch ($codeErreur)
		{
			case 1:
	        		$messageErreur = $traduction['1'];
				break;
			case 2:
	  	  		$messageErreur = $traduction['2'];
				break;
			case 3:
			        $messageErreur = $traduction['3'];
				break;
			case 4:
		    		$messageErreur = $traduction['4'];
				break;
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./static/css/css_chat.css">
		<link href="./static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<title>ZZChat'</title>
	</head>
	<body class="animated fadeInDown">

		<h1 class="centrer">ZZ'Chat</h1>
		<div id="langues" class="centrer">
			<?php include_once("./static/html/langues.html"); ?>
		</div>

		<h3 class="centrer"><?php echo $traduction['5'] ?></h3>

		<form class="centrer" action="./src/verif_connexion.php" method="post">
			<br />
			<input type="text" name="login" placeholder= <?php echo '"' . $traduction['8'] . '" ' ?>
			<?php
			if (isset($_COOKIE['lastuser']) )
			{
				echo "value='" . $_COOKIE['lastuser'] . "'";
			}
			?>
			>
			<br />
			<br />
			<input type="password" name="pwd" placeholder="<?php echo $traduction['9'] ?>">

			<br />
			<br />
			<input type="submit" value="<?php echo $traduction['10'] ?>">
			<br />
			<p class="blanc">
				<?php echo $traduction['6'] ?>
				<a href="./src/inscription.php">
					<?php echo $traduction['7'] ?>
				</a>
			</p>
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

<?php
	include("./json_fonctions.php");

	$codeErreur = NULL;

	// If all var are not set we redirect to the inscription page with an error code
	if (empty($_POST['login']) || empty($_POST['pwd']) || empty($_POST['pwd2']))
		$codeErreur = 1;

	else
	{
		$userNameRecu	= $_POST['login'];
		$mdpRecu		= $_POST['pwd'];
		$file			= '../db/utilisateurs';

		if (existe($file,$userNameRecu))
			$codeErreur = 3;

		else if ($mdpRecu != $_POST['pwd2'])
			$codeErreur = 2;

		else
		{
			ajouter($file,$userNameRecu,$mdpRecu);
			// To initialise a session variable
			session_start();
			$_SESSION['login'] = $userNameRecu;
		}
	}

	if ($codeErreur != NULL)
		header("Location: ./inscription.php?erreur=$codeErreur");
?>

<!Doctype HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<?php	
	echo "$userNameRecu a été créé avec succès.";
?>
</html>

<?php
	time_sleep_until(time()+2);
	header('Location: ./chat.php');
?>

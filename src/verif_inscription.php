<?php
	/* To activate error display during dev */
	ini_set('display_errors', true);
	ini_set('error_reporting', E_ALL);
	error_reporting(-1);

	include("json_fonctions.php");

	/* If all var are not setted we redirect to the 'inscription' page an error code */
	if (!isset($_POST["login"]) || !isset($_POST["pwd"]) || !isset($_POST["pwd2"]) || empty($_POST["login"]) || empty($_POST["pwd"]) || empty($_POST["pwd2"]) )
	{
		$codeErreur = 1;
	}
	else
	{
		$userNameRecu 	= $_POST["login"];
		$mdpRecu	= $_POST["pwd"];
		$mdpRecu2	= $_POST["pwd2"];
		$file 		= "../db/utilisateurs";

		if (existe($file,$userNameRecu) == true)
		{
			$codeErreur = 3;
		}
		else
		{
			if ($_POST["pwd"] != $_POST["pwd2"])
			{
				$codeErreur = 2;
			}
			else
			{
				ajouter($file,$userNameRecu,$mdpRecu);
				/* To initialise a session variable */
  				session_start();
  				$_SESSION['login'] = $userNameRecu;
				header("Location: ./chat.php");
				exit;
			}
		}
	}

	header("Location: ./inscription.php?erreur=$codeErreur");
?>

<!Doctype HTML>
<html>
<meta charset="utf-8">

<?ph
	echo "$userNameRecu a été créé avec succes.";
?>
</html>

<?php
	/* To activate error display during dev */
	ini_set('display_errors', true); 
	ini_set('error_reporting', E_ALL);
	error_reporting(-1);

	include("json_fonctions.php");

	/* If at least one input field of the form were empty */
	if (!isset($_POST["login"]) || !isset($_POST["pwd"]) || empty($_POST["login"]) || empty($_POST["pwd"]))
	{
		$codeErreur = 1;
	}
	else
	{
		$userNameRecu 	= $_POST["login"];
		$mdpRecu		= $_POST["pwd"];
		$file 			= "../db/utilisateurs";

		/* If the username received is not in the database */
		if (!existe($file,$userNameRecu) == true)
		{
			$codeErreur = 3; 
		}
		/* If the password received does not match */
		else if (getMdp($file,$userNameRecu) != hash("sha512",$mdpRecu))
		{
			$codeErreur = 2;
		}
		else
		{
			/* To initialise a session variable */
			session_start();
			$_SESSION['login'] = $userNameRecu;
			ajouterDansListeDesConnectes($userNameRecu);
			header('Location: chat.php');
		}
	}

	header("Location: ../index.php?erreur=$codeErreur");
?>

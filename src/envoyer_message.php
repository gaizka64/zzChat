<?php

	// On démarre la session AVANT d'écrire du code HTML
	session_start();

	// Pour activer les messages d'erreur
	ini_set('display_errors', true); 

	if ( !isset($_SESSION['login']) || empty($_SESSION['login']) )
	{
		header('Location: ../index.php?erreur=4');
  		exit; 
	}
	else
	{
		if ( !isset($_POST['msg']) || empty($_POST['msg']) )
		{
			echo "pas de message reçu";
		}
		else
		{
			$msg   = $_POST['msg'];

			/* Pour empêcher les éventuelles injections HTML */
			$msgCorrige = str_replace("<b>","[gras]",$msg);
			$msgCorrige = str_replace("</b>","[/gras]",$msg);

			$msgCorrige = str_replace("<i>","[italic]",$msg);
			$msgCorrige = str_replace("</i>","[/italic]",$msg);

			$msgCorrige = str_replace("<u>","[underline]",$msg);
			$msgCorrige = str_replace("</u>","[/underline]",$msg);

			$msgCorrige = htmlspecialchars($msgCorrige);

			$msgCorrige = str_replace("[gras]","<b>",$msg);
			$msgCorrige = str_replace("[/gras]","</b>",$msg);

			$msgCorrige = str_replace("[italic]","<i>",$msg);
			$msgCorrige = str_replace("[/italic]","</i>",$msg);

			$msgCorrige = str_replace("[underline]","<u>",$msg);
			$msgCorrige = str_replace("[/underline]","</u>",$msg);

			$msg = $msgCorrige;

			$ligne = "[" . date("H:i:s") . "]" . " - " . $_SESSION['login'] . " : " . $_POST['msg'] . "<br/>\n";
			$ficDiscussion = file('../db/discussion.txt'); //On lit le fichier discussion et on stocke la réponse dans une variable (de type tableau)
			array_push($ficDiscussion, $ligne); //On ajoute le texte calculé dans la ligne précédente au début du tableau
			file_put_contents('../db/discussion.txt', $ficDiscussion); //On écrit le contenu du tableau $leFichier dans le fichier discussion
		}
	}
?>

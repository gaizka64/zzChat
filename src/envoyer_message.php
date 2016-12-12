<?php

	// On démarre la session AVANT d'écrire du code HTML
	session_start();

	if (empty($_SESSION['login']))
	{
		header("Location: ../index.php?erreur=4");
  		exit; 
	}
	else
	{
		if (empty($_POST['msg']))
		{
			echo 'Pas de message reçu'; 
		}
		else
		{
			$msg   = $_POST['msg'];

			/* Pour empêcher les éventuelles injections HTML */
			$msg = str_replace("<b>","[gras]",$msg);
			$msg = str_replace("</b>","[/gras]",$msg);

			$msg = str_replace("<i>","[italic]",$msg);
			$msg = str_replace("</i>","[/italic]",$msg);

			$msg = str_replace("<u>","[underline]",$msg);
			$msg = str_replace("</u>","[/underline]",$msg);
			

			$msg = str_replace("<br>","[saut]",$msg);
	
			var_dump($msg);
			$msg = htmlspecialchars($msg);
			var_dump($msg);
	

			$msg = str_replace("[saut]","<br>",$msg);

			$msg = str_replace("[gras]","<b>",$msg);
			$msg = str_replace("[/gras]","</b>",$msg);

			$msg = str_replace("[italic]","<i>",$msg);
			$msg = str_replace("[/italic]","</i>",$msg);

			$msg = str_replace("[underline]","<u>",$msg);
			$msg = str_replace("[/underline]","</u>",$msg);

          		$ligne = "[" . date("H:i:s") . "]" . " - " . $_SESSION['login'] . " : " . $msg . "<br/>\n";

			$ficDiscussion = file('../db/discussion.txt'); //On lit le fichier discussion et on stocke la réponse dans une variable (de type tableau)
			array_push($ficDiscussion, $ligne); //On ajoute le texte calculé dans la ligne précédente au début du tableau
			file_put_contents('../db/discussion.txt', $ficDiscussion); //On écrit le contenu du tableau $leFichier dans le fichier discussion
		}
	}
?>

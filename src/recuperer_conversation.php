<?php

	/* To initialise a session variable */
	
ini_set('display_errors','off');	
  	session_start();

	/* If the session var is not initialised, we redirect to the 'verif_connexion' */
	if (!empty($_SESSION['login']))
	{
		readfile("../db/discussion.txt");
	}
?>

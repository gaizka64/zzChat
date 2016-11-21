<?php

	  /* To initialise a session variable */
  	session_start();

	/* If the session var is not initialise, we redirect to the 'verf_connexion' page which */
	if (isset($_SESSION['login']) AND !empty($_SESSION['login']))
	{
		readfile("../db/discussion.txt");
	}
?>
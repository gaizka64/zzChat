<?php

function recupTraduction($langue)
{
	$tableau['fr'] = array(
		"1" => "Tous les champs doivent être remplis.",
		"2" => "Mot de passe incorrect.",
		"3" => "L'utilisateur n'existe pas.",
		"4" => "Vous devez vous connecter pour accéder au t'chat.",
		"5" => "Connnexion",
		"6" => "Première connexion ?",
		"7" => "Inscription",
		"8" => "Nom d'utilisateur",
		"9" => "Mot de passe",
		"10" => "Connexion",
		"11" => "Erreur",
		"12" => "Déconnexion",
		"13" => "Utilisateurs connectés"
		);

	$tableau['eu'] = array(
		"1" => "All inputs have to be completed.",
		"2" => "Bad password",
		"3" => "User doesn't exist",
		"4" => "You need to log in first before accessing to the chat",
		"5" => "Log In",
		"6" => "First connexion ?",
		"7" => "Sign Up",
		"8" => "Username",
		"9" => "Password",
		"10" => "Log In",
		"11" => "Error",
		"12" => "Log Out",
		"13" => "Connected Users"
		);

	return $tableau["$langue"];
}

?>
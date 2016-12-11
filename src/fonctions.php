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
		"13" => "Utilisateurs connectés :",
		"14" => "Entrée = Envoyer"
		);

	$tableau['eu'] = array(
		"1" => "Gune guziak beteak izan behar dute.",
		"2" => "Pasahitza ez da ona.",
		"3" => "Erabiltzailea ez da existitzen.",
		"4" => "Konektatu behar duzu txatan sartzeko.",
		"5" => "Konektatu",
		"6" => "Lehen konekzioa ?",
		"7" => "Izen emate",
		"8" => "Erabiltzaile izena",
		"9" => "Pasahitza",
		"10" => "Konektatu",
		"11" => "Makur",
		"12" => "Deskonektatu",
		"13" => "Erabiltzaile konektatuak :",
		"14" => "Maite = Zaitut"
		);

	$tableau['en'] = array(
		"1" => "All inputs have to be completed.",
		"2" => "Bad password",
		"3" => "User doesn't exist",
		"4" => "You need to log in first before accessing to the chat",
		"5" => "Log in",
		"6" => "First connexion?",
		"7" => "Sign up",
		"8" => "Username",
		"9" => "Password",
		"10" => "Log in",
		"11" => "Error",
		"12" => "Log out",
		"13" => "Connected users:",
		"14" => "Press Enter = Send"
		);

	return $tableau["$langue"];
}
?>

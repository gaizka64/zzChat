<?php

use PHPUnit\Framework\TestCase;

<<<<<<< HEAD
require("../src/json_fonctions.php");

class json_fonctions_test extends TestCase
{
    public function test1()
    {
        $nomFichier = "../db/utilisateurs";

        $user  = "ximun";
        $user2 = "jenofa";

        // Assert
        $this->assertEquals(false, existe($nomFichier,$user));
        $this->assertEquals(false, existe($nomFichier,$user2));
    }

    public function test2()
    {
        $nomFichier = "../db/utilisateurs";

        $user  = "gaizka";
        $user2 = "jenofa2";

        // Assert
        $this->assertEquals(true, existe($nomFichier,$user));
        $this->assertEquals(false, existe($nomFichier,$user2));
    }    
}
=======
require_once("../src/json_fonctions.php");

class json_fonctions_test extends TestCase
{
	public function testExiste()
	{
		$nomFichier = "../db/utilisateurs";

		$user  = "testeur_present";
		$user2 = "testeur_absent";

		// Assertions
		$this->assertEquals(true, existe($nomFichier,$user));
		$this->assertEquals(false, existe($nomFichier,$user2));
	}

	public function testAjouter()
	{
		$nomFichier = "../db/utilisateurs";
		$userAAjouter = "testeur";

		$this->assertEquals(false, existe($nomFichier, $userAAjouter));
		ajouter($nomFichier, $userAAjouter, "mdpTesteur");
		$this->assertEquals(true, existe($nomFichier, $userAAjouter));
		
	}	

	public function testSupprimer()
	{
		$nomFichier = "../db/utilisateurs";
		$userASupprimer = "testeur";

		ajouter($nomFichier, $userASupprimer, "mdpTesteur");
		$this->assertEquals(true, existe($nomFichier, $userASupprimer));
		supprimer($nomFichier, $userASupprimer);
		$this->assertEquals(false, existe($nomFichier, $userASupprimer));
	}

	public function testGetMdp()
	{
		$nomFichier = "../db/utilisateurs";
		$user = "testeur";
		$mdpUser = "mdpTesteur";

		ajouter($nomFichier, $user, $mdpUser);
		$this->assertEquals(hash("sha512", $mdpUser), getMdp($nomFichier, $user));
	}
}
>>>>>>> a86f9cc80fac12e804fe7a5dc0d471513d823a06

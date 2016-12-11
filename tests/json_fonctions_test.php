<?php

use PHPUnit\Framework\TestCase;

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
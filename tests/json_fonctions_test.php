<?php
use PHPUnit\Framework\TestCase;
require("json_fonctions.php");

class json_fonctions_test extends TestCase
{
    // ...

    public function testExiste()
    {
        $nomFichier = "utilisateurs";

        $user  = "gaizka";
        $user2 = "jenofa";

        // Assert
        $this->assertEquals(true, existe($nomFichier,$user));
        $this->assertEquals(false, existe($nomFichier,$user2));
    }

    // ...
}
<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Utilisateur;
    
class UtilisateurTest extends TestCase
{
    public function testNewUtilisateur(): void
    {
        $utilisateur = new Utilisateur();
        $this->assertInstanceOf(Utilisateur::class, $utilisateur);
    }
}

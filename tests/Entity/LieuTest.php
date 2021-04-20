<?php

namespace App\Tests\Entity;

use App\Entity\Adherent;
use App\Repository\LieuRepository;
use PHPUnit\Framework\TestCase;
use App\Entity\Lieu;
    
class LieuTest extends TestCase
{
    public function lieuProvider()
    {
        return [
            ["45.1896699", "5.7244652", "Grenoble"],
        ];
    }

    /**
     * @dataProvider lieuProvider
     */
    public function testNewLieu(): void
    {
        $lieu = new Lieu();
        $this->assertInstanceOf(Lieu::class, $lieu);
    }

    public function testNewTrajetLieu(): void
    {
        $lieuRep = new LieuRepository();
        $lieu = $lieuRep->findById(1);
        $this->assertInstanceOf(Lieu::class, $lieu);
        $adherent = new Adherent();
        $adherent->setNom($nomAdh);
        $adherent->setPrenom($prenomAdh);
        $adherent->setDateNaissance(new \DateTime($dateAdh));
    }
}

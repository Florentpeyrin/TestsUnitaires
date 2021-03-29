<?php

namespace App\Tests\Entity;

use App\Entity\Adherent;
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
    public function adherentProvider()
    {
        return [
            ["Viallon", "Gabriel", "14/02/2001"],
        ];
    }
    public function trajetProvider()
    {
        return [
            ["Grenoble", "Lyon", "19/03/2021 17:00", "19/03/2021 19:00"],
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

    /**
     * @dataProvider lieuProvider, adherentProvider
     */
    public function testNewTrajetLieu($lat, $lon, $nomLieu, $nomAdh, $prenomAdh, $dateAdh): void
    {
        $lieu = new Lieu();
        $lieu->setLat($lat);
        $lieu->setLon($lon);
        $lieu->setNom($nomLieu);
        $adherent = new Adherent();
        $adherent->setNom($nomAdh);
        $adherent->setPrenom($prenomAdh);
        $adherent->setDateNaissance(new \DateTime($dateAdh));
    }
}

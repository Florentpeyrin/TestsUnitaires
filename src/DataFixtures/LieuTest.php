<?php

namespace App\DataFixtures;

use App\Entity\Adherent;
use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LieuTest extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $lieu = new Lieu();
        $lieu->setLat("45.1896699");
        $lieu->setLon("5.7244652");
        $lieu->setNom("Grenoble");
        $manager->persist($lieu);

        $manager->flush();
    }
}

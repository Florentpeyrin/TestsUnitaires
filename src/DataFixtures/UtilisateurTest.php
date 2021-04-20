<?php

namespace App\DataFixtures;

use App\Entity\Adherent;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurTest extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $adherent = new Adherent();
        $adherent->setNom('Viallon');
        $adherent->setPrenom('Gabriel');
        $adherent->setDateNaissance(new \DateTime("02/14/2001"));

        $manager->persist($adherent);
        $manager->flush();

        $utilisateur = new Utilisateur();
        $utilisateur->setEmail('user@mail.com');
        $utilisateur->setPseudo('user');
        $utilisateur->setAdherent($adherent);

        $manager->persist($utilisateur);
        $manager->flush();
    }
}

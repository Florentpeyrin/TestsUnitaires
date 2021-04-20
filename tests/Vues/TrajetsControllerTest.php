<?php

namespace App\Tests\Entity;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TrajetsControllerTest extends WebTestCase {

    public function testNombreTrajets()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/trajets');
        // Vérifie qu'il y au maximum 10 trajets affichés sur la page (div avec classe 'trajet')
        $this->assertLessThanOrEqual(10, $crawler->filter('div.trajet')->count());
    }

    public function testBarreRecherche()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/trajets');
        //Vérifie qu'il y a une barre de recherche
        $this->assertCount(1, $crawler->filter('input.search'));
    }

    public function testLienTrajet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/trajets');

        //Clique sur le lien pour afficher les détails d'un trajet
        $link = $crawler->selectLink('Voir les détails')->link();
        $client->click($link);

        //Vérifie que le lien redirige bien quelque part
        $this->assertTrue($client->getResponse()->isRedirect());

        //Vérifie que la redirection mène à la page détails
        $client->followRedirect();
        $this->assertStringContainsString('/trajets/details/', $client->getRequest()->getUri());
    }

    public function testTitreTrajet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/trajets');
        //Vérifie qu'il y a bien un titre
        $this->assertCount(1, $crawler->filter('h1'));
    }

    public function testBoutonNouveauTrajet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/trajets');
        //Vérifie qu'il y a bien un bouton pour créer un nouveau trajet (classe 'newTrajet')
        $this->assertCount(1, $crawler->filter('button.newTrajet'));
    }

    public function testTrajetsJournee()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/trajets');

        //Vérifie que les trajets proposés sont bien dans la journée
        $dateTrajetsString = $crawler->filter('h2.dateTrajets')->text();
        $dateTrajet = new DateTime($dateTrajetsString);
        $ajd = new DateTime();

        $this->assertTrue($dateTrajet == $ajd);
    }
}
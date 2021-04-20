<?php

namespace App\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AccueilControllerTest extends WebTestCase {

    public function testSlogan()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        // Vérifie qu'il y a un slogan (h1 avec classe 'slogan')
        $this->assertCount(1, $crawler->filter('h1.slogan'));
    }

    public function testTitres()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        //Vérifie qu'il y a au moins 3 sous-titres (h2)
        $this->assertGreaterThan(3, $crawler->filter('h2')->count());
    }

    public function testFormulaire()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        //Vérifie qu'il y a bien un formulaire d'inscription
        $this->assertCount(1, $crawler->filter('form'));
    }


    //TODO Compléter cette fonction pas finie
    public function testCheckboxRGPD()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        //Vérifie qu'il y a bien une checkBox de consentement aux données personnelles pour l'inscription

        $bouton = $crawler->select('submit');

        $this->assertCount(1, $crawler->filter('form'));
    }

    public function testLogoTaille()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        //Vérifie que le logo de l'entreprise est à une taille optimale(160*160)

        $image = $crawler->selectImage('logo-entreprise');

        $size = getimagesize($image);

        $this->assertEquals('160', $size[0]);
        $this->assertEquals('160', $size[1]);
    }

    public function testTypeContenu(){
        // Vérifie que le contenu est bien de type MIME "application/json"
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }

    public function testFormulaireSubmit(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $bouton = $crawler->selectButton('submit');

        // Selectionne le formulaire d'inscription qui contient le bouton et mettre des données dans les input
        $formulaire = $bouton->form([
            'inscriptionForm[pseudo]'    => 'Flo',
            'inscriptionForm[ref-adherent]' => '175',
            'inscriptionForm[mdp]' => 'phpunit',
        ]);

        // Coche le consentement aux données personnelles
        $formulaire['rgpd-check']->tick();

        // Valide le formulaire
        $client->submit($formulaire);
    }

    public function testReseauxSociaux(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        // Clique sur le lien qui possède le texte 'Suivez nous sur Insta'
        $link = $crawler->selectLink('Suivez nous sur Insta')->link();
        $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testFooter(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        // Vérifie qu'il y a bien un footer
        $this->assertCount(1, $crawler->filter('footer'));
    }
}
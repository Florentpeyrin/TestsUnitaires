<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class URLTest extends WebTestCase
{
    public function testPagesActives(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testPagesInactives(): void
    {
        // Vérifie qu'un mauvais ID (négatif) de trajet renvoie bien une erreur 404

        $client = static::createClient();

        $client->request('GET', '/trajet/details/-1');

        $this->assertTrue($client->getResponse()->isNotFound());
    }
}

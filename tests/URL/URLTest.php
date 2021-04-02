<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class URLTest extends WebTestCase
{
    public function testShowGet(): void
    {
        $client = static::createClient();

        $client->request('GET', 'http://localhost:8000/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}

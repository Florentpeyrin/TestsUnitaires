<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Trajet;
    
class TrajetTest extends TestCase
{
    public function testNewTrajet(): void
    {
        $trajet = new Trajet();
        $this->assertInstanceOf(Trajet::class, $trajet);
    }
}

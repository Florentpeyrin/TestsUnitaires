<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Lieu;
    
class LieuTest extends TestCase
{
    public function testNewLieu(): void
    {
        $lieu = new Lieu();
        $this->assertInstanceOf(Lieu::class, $lieu);
    }
}

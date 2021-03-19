<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Lieu;
    
class LieuTest extends TestCase
{
    public function adhProvider()
    {
        return [
            ["45.1896699", "5.7244652", "Grenoble"],
        ];
    }

    /**
     * @dataProvider adhProvider
     */
    public function testNewLieu($lat, $lon, $nom): void
    {
        $lieu = new Lieu();
        $lieu->setLat($lat);
        $lieu->setLon($lon);
        $lieu->setNom($nom);
        $this->assertInstanceOf(Lieu::class, $lieu);
    }
}

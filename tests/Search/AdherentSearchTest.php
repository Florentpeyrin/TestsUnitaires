<?php

namespace App\Tests\Search;

use PHPUnit\Framework\TestCase;

use App\Search\AdherentSearch;
use App\Entity\Adherent;

class AdherentSearchTest extends TestCase
{
    public function adhProvider()
    {
        return [
            ["Dupont", "Pierre", "01012000DUPONT_PIERRE"],
            ["Dupont", "Jean-Pierre", "01012000DUPONT_JEANPIERRE"],
        ];
    }

    /**
     * @dataProvider adhProvider
     */
    public function testAdherentIdentifiantNormalise($nom, $prenom, $ident) {
        $search = new AdherentSearch();
        $adherent = new Adherent();
        $adherent->setNom($nom);
        $adherent->setPrenom($prenom);
        $adherent->setDateNaissance(new \DateTime('01/01/2000'));
        $this->assertEquals(
            $search->identifiantNormalise($adherent),
            $ident
        );
    }
}


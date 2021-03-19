<?php

namespace App\Search;

use App\Entity\Adherent;

class AdherentSearch
{
    public function identifiantNormalise(Adherent $adherent) {
        $nom = $adherent->getNom();
        $prenom = $adherent->getPrenom();
        $date = $adherent->getDateNaissance();
        $ident = $date->format("dmY") . strtoupper(str_replace("-", "", $nom)) . '_' . strtoupper(str_replace("-", "", $prenom));
        return $ident;
    }
}

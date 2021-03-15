<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrajetRepository::class)
 */
class Trajet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Adherent::class, inversedBy="trajets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adherent;

    /**
     * @ORM\ManyToOne(targetEntity=Lieu::class, inversedBy="departs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu_depart;

    /**
     * @ORM\ManyToOne(targetEntity=Lieu::class, inversedBy="arrivees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu_arrivee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_depart;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_places;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?Adherent $adherent): self
    {
        $this->adherent = $adherent;

        return $this;
    }

    public function getLieuDepart(): ?Lieu
    {
        return $this->lieu_depart;
    }

    public function setLieuDepart(?Lieu $lieu_depart): self
    {
        $this->lieu_depart = $lieu_depart;

        return $this;
    }

    public function getLieuArrivee(): ?Lieu
    {
        return $this->lieu_arrivee;
    }

    public function setLieuArrivee(?Lieu $lieu_arrivee): self
    {
        $this->lieu_arrivee = $lieu_arrivee;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nb_places;
    }

    public function setNbPlaces(int $nb_places): self
    {
        $this->nb_places = $nb_places;

        return $this;
    }
}

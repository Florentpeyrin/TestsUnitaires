<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LieuRepository::class)
 */
class Lieu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $lat;

    /**
     * @ORM\Column(type="float")
     */
    private $lon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="lieu_depart")
     */
    private $departs;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="lieu_arrivee")
     */
    private $arrivees;

    public function __construct()
    {
        $this->departs = new ArrayCollection();
        $this->arrivees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getDeparts(): Collection
    {
        return $this->departs;
    }

    public function addDepart(Trajet $depart): self
    {
        if (!$this->departs->contains($depart)) {
            $this->departs[] = $depart;
            $depart->setLieuDepart($this);
        }

        return $this;
    }

    public function removeDepart(Trajet $depart): self
    {
        if ($this->departs->removeElement($depart)) {
            // set the owning side to null (unless already changed)
            if ($depart->getLieuDepart() === $this) {
                $depart->setLieuDepart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getArrivees(): Collection
    {
        return $this->arrivees;
    }

    public function addArrivee(Trajet $arrivee): self
    {
        if (!$this->arrivees->contains($arrivee)) {
            $this->arrivees[] = $arrivee;
            $arrivee->setLieuArrivee($this);
        }

        return $this;
    }

    public function removeArrivee(Trajet $arrivee): self
    {
        if ($this->arrivees->removeElement($arrivee)) {
            // set the owning side to null (unless already changed)
            if ($arrivee->getLieuArrivee() === $this) {
                $arrivee->setLieuArrivee(null);
            }
        }

        return $this;
    }
}

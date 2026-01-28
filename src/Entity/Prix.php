<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "prix")]
// Représente une catégorie de prix pour les films (peut-être format DVD/Blu-ray ou location)
class Prix
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_prix")]
    #[ORM\GeneratedValue]
    private $id_prix;

    #[ORM\Column(type: "decimal", precision: 4, scale: 2)]
    private $prix;

    #[ORM\OneToMany(targetEntity: Films::class, mappedBy: "prix")]
    private $films;

    public function __construct()
    {
        $this->films = new ArrayCollection();
    }

    public function getIdPrix(): ?int
    {
        return $this->id_prix;
    }
    public function getPrix(): ?string
    {
        return $this->prix;
    }
    public function setPrix(string $prix): self
    {
        $this->prix = $prix;
        return $this;
    }
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function getPrixActuel(): float
    {
        $prix = $this->prix;

        if ((int) (new \DateTime())->format('N') === 3) {
            $prix *= 0.8;
        }

        return round($prix, 2);
    }

    public function getPrixPourDate(\DateTimeInterface $date): float
    {
        $prix = $this->prix;

        // Applique la réduction de 20% si la date donnée est un mercredi (jour 3)
        if ((int) $date->format('N') === 3) {
            $prix *= 0.8;
        }

        return round($prix, 2);
    }
}

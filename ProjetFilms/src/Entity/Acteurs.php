<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "acteurs")]
class Acteurs
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_Acteur")]
    #[ORM\GeneratedValue]
    private $id_Acteur;

    #[ORM\Column(type: "string", length: 100, name: "nom_Acteur")]
    private $nom_Acteur;

    #[ORM\ManyToMany(targetEntity: Films::class, mappedBy: "acteurs")]
    private $films;

    public function __construct() {
        $this->films = new ArrayCollection();
    }

    public function getIdActeur(): ?int { return $this->id_Acteur; }
    public function getNomActeur(): ?string { return $this->nom_Acteur; }
    public function setNomActeur(string $nom_Acteur): self { $this->nom_Acteur = $nom_Acteur; return $this; }
    public function getFilms(): Collection { return $this->films; }
}

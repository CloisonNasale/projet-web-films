<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "realisateurs")]
// Représente les réalisateurs des films
class Realisateurs
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_realisateur")]
    #[ORM\GeneratedValue]
    private $id_realisateur;

    #[ORM\Column(type: "string", length: 100, name: "nom_realisateur")]
    private $nom_realisateur;

    #[ORM\OneToMany(targetEntity: Films::class, mappedBy: "realisateur")]
    private $films;

    public function __construct() {
        $this->films = new ArrayCollection();
    }

    public function getIdRealisateur(): ?int { return $this->id_realisateur; }
    public function getNomRealisateur(): ?string { return $this->nom_realisateur; }
    public function setNomRealisateur(string $nom_realisateur): self { $this->nom_realisateur = $nom_realisateur; return $this; }
    public function getFilms(): Collection { return $this->films; }
}

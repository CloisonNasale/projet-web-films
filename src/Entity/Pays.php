<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "pays")]
class Pays
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_pays")]
    #[ORM\GeneratedValue]
    private $id_pays;

    #[ORM\Column(type: "string", length: 100, name: "nom_pays")]
    private $nom_pays;

    #[ORM\OneToMany(targetEntity: Films::class, mappedBy: "pays")]
    private $films;

    public function __construct() {
        $this->films = new ArrayCollection();
    }

    public function getIdPays(): ?int { return $this->id_pays; }
    public function getNomPays(): ?string { return $this->nom_pays; }
    public function setNomPays(string $nom_pays): self { $this->nom_pays = $nom_pays; return $this; }
    public function getFilms(): Collection { return $this->films; }
}

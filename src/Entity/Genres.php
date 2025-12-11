<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "genres")]
class Genres
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_Genre")]
    #[ORM\GeneratedValue]
    private $id_Genre;

    #[ORM\Column(type: "string", length: 50, name: "nom_Genre")]
    private $nom_Genre;

    #[ORM\ManyToMany(targetEntity: Films::class, mappedBy: "genres")]
    private $films;

    public function __construct() {
        $this->films = new ArrayCollection();
    }

    public function getIdGenre(): ?int { return $this->id_Genre; }
    public function getNomGenre(): ?string { return $this->nom_Genre; }
    public function setNomGenre(string $nom_Genre): self { $this->nom_Genre = $nom_Genre; return $this; }
    public function getFilms(): Collection { return $this->films; }
}

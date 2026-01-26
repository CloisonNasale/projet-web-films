<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "films")]
// Représente un film avec toutes ses propriétés (titre, année, genre, etc.)
class Films
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_Film")]
    #[ORM\GeneratedValue]
    private $id_Film;

    #[ORM\Column(type: "string", length: 68, nullable: true, name: "titre")]
    private $titre;

    #[ORM\Column(type: "string", length: 4, nullable: true, name: "annee")]
    private $annee;

    #[ORM\Column(type: "string", length: 11, nullable: true, name: "classementIMDB")]
    private $classementIMDB;

    #[ORM\Column(type: "string", length: 14, nullable: true, name: "duree")]
    private $duree;

    #[ORM\Column(type: "string", length: 10, nullable: true, name: "oscarGagne")]
    private $oscarGagne;

    #[ORM\Column(type: "string", length: 15, nullable: true, name: "boxOffice")]
    private $boxOffice;

    #[ORM\Column(type: "string", length: 60, nullable: true, name: "IdIMDB")]
    private $IdIMDB;

    #[ORM\Column(type: "string", length: 300, nullable: true, name: "affiche")]
    private $affiche;

    #[ORM\Column(type: "text", nullable: true, name: "synopsis")]
    private $synopsis;

    #[ORM\Column(type: "string", length: 255, nullable: true, name: "bande_annonce")]
    private $bande_annonce;

    #[ORM\ManyToOne(targetEntity: Prix::class, inversedBy: "films")]
    #[ORM\JoinColumn(name: "id_prix", referencedColumnName: "id_prix", nullable: true)]
    private $prix;

    #[ORM\ManyToOne(targetEntity: Pays::class, inversedBy: "films")]
    #[ORM\JoinColumn(name: "id_pays", referencedColumnName: "id_pays", nullable: true)]
    private $pays;

    #[ORM\ManyToOne(targetEntity: Realisateurs::class, inversedBy: "films")]
    #[ORM\JoinColumn(name: "id_realisateur", referencedColumnName: "id_realisateur", nullable: true)]
    private $realisateur;

    #[ORM\ManyToMany(targetEntity: Acteurs::class, inversedBy: "films")]
    #[ORM\JoinTable(name: "jouer", joinColumns: [new ORM\JoinColumn(name: "id_Film", referencedColumnName: "id_Film")], inverseJoinColumns: [new ORM\JoinColumn(name: "id_Acteur", referencedColumnName: "id_Acteur")])]
    private $acteurs;

    #[ORM\ManyToMany(targetEntity: Genres::class, inversedBy: "films")]
    #[ORM\JoinTable(name: "genreFilm", joinColumns: [new ORM\JoinColumn(name: "id_Film", referencedColumnName: "id_Film")], inverseJoinColumns: [new ORM\JoinColumn(name: "id_Genre", referencedColumnName: "id_Genre")])]
    private $genres;

    #[ORM\ManyToMany(targetEntity: Compte::class, mappedBy: "favoris")]
    private $comptesFavoris;

    #[ORM\ManyToMany(targetEntity: Compte::class, mappedBy: "panier")]
    private $comptesPanier;

    #[ORM\ManyToMany(targetEntity: Commandes::class, mappedBy: "films")]
    private $commandes;

    public function __construct() {
        $this->acteurs = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->comptesFavoris = new ArrayCollection();
        $this->comptesPanier = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    // === Getters et setters ===
    public function getIdFilm(): ?int { return $this->id_Film; }
    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(?string $titre): self { $this->titre = $titre; return $this; }
    public function getAnnee(): ?string { return $this->annee; }
    public function setAnnee(?string $annee): self { $this->annee = $annee; return $this; }
    public function getClassementIMDB(): ?string { return $this->classementIMDB; }
    public function setClassementIMDB(?string $classementIMDB): self { $this->classementIMDB = $classementIMDB; return $this; }
    public function getDuree(): ?string { return $this->duree; }
    public function setDuree(?string $duree): self { $this->duree = $duree; return $this; }
    public function getOscarGagne(): ?string { return $this->oscarGagne; }
    public function setOscarGagne(?string $oscarGagne): self { $this->oscarGagne = $oscarGagne; return $this; }
    public function getBoxOffice(): ?string { return $this->boxOffice; }
    public function setBoxOffice(?string $boxOffice): self { $this->boxOffice = $boxOffice; return $this; }
    public function getIdIMDB(): ?string { return $this->IdIMDB; }
    public function setIdIMDB(?string $IdIMDB): self { $this->IdIMDB = $IdIMDB; return $this; }
    public function getAffiche(): ?string { return $this->affiche; }
    public function setAffiche(?string $affiche): self { $this->affiche = $affiche; return $this; }
    public function getSynopsis(): ?string { return $this->synopsis; }
    public function setSynopsis(?string $synopsis): self { $this->synopsis = $synopsis; return $this; }
    public function getBandeAnnonce(): ?string { return $this->bande_annonce; }
    public function setBandeAnnonce(?string $bande_annonce): self { $this->bande_annonce = $bande_annonce; return $this; }
    public function getPrix(): ?Prix { return $this->prix; }
    public function setPrix(?Prix $prix): self { $this->prix = $prix; return $this; }
    public function getPays(): ?Pays { return $this->pays; }
    public function setPays(?Pays $pays): self { $this->pays = $pays; return $this; }
    public function getRealisateur(): ?Realisateurs { return $this->realisateur; }
    public function setRealisateur(?Realisateurs $realisateur): self { $this->realisateur = $realisateur; return $this; }
    public function getActeurs(): Collection { return $this->acteurs; }
    public function getGenres(): Collection { return $this->genres; }
    public function getComptesFavoris(): Collection { return $this->comptesFavoris; }
    public function getComptesPanier(): Collection { return $this->comptesPanier; }
    public function getCommandes(): Collection { return $this->commandes; }
}

<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "compte")]
class Compte
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_Compte")]
    #[ORM\GeneratedValue]
    private $id_Compte;

    #[ORM\Column(type: "string", length: 50)]
    private $nom;

    #[ORM\Column(type: "string", length: 50)]
    private $prenom;

    #[ORM\Column(type: "string", length: 100)]
    private $mail;

    #[ORM\Column(type: "string", length: 255)]
    private $motdepasse;

    #[ORM\Column(type: "string", length: 20, nullable: true)]
    private $telephone;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $pdp;

    #[ORM\ManyToMany(targetEntity: Films::class, inversedBy: "comptesFavoris")]
    #[ORM\JoinTable(name: "favoris")]
    private $favoris;

    #[ORM\ManyToMany(targetEntity: Films::class, inversedBy: "comptesPanier")]
    #[ORM\JoinTable(name: "panier")]
    private $panier;

    #[ORM\OneToMany(targetEntity: Commandes::class, mappedBy: "compte")]
    private $commandes;

    public function __construct() {
        $this->favoris = new ArrayCollection();
        $this->panier = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    public function getIdCompte(): ?int { return $this->id_Compte; }
    public function getNom(): ?string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getPrenom(): ?string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }
    public function getMail(): ?string { return $this->mail; }
    public function setMail(string $mail): self { $this->mail = $mail; return $this; }
    public function getMotdepasse(): ?string { return $this->motdepasse; }
    public function setMotdepasse(string $motdepasse): self { $this->motdepasse = $motdepasse; return $this; }
    public function getTelephone(): ?string { return $this->telephone; }
    public function setTelephone(?string $telephone): self { $this->telephone = $telephone; return $this; }
    public function getPdp(): ?string { return $this->pdp; }
    public function setPdp(?string $pdp): self { $this->pdp = $pdp; return $this; }
    public function getFavoris(): Collection { return $this->favoris; }
    public function getPanier(): Collection { return $this->panier; }
    public function getCommandes(): Collection { return $this->commandes; }
}

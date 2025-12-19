<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "commandes")]
class Commandes
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_Commande")]
    #[ORM\GeneratedValue]
    private $id_Commande;

    #[ORM\Column(type: "datetime", name: "date_Commande")]
    private $date_Commande;

    #[ORM\ManyToOne(targetEntity: Compte::class, inversedBy: "commandes")]
    #[ORM\JoinColumn(name: "id_Compte", referencedColumnName: "id_Compte")]
    private $compte;

    #[ORM\ManyToMany(targetEntity: Films::class, inversedBy: "commandes")]
    #[ORM\JoinTable(name: "Commander", joinColumns: [new ORM\JoinColumn(name: "id_Commande", referencedColumnName: "id_Commande")], inverseJoinColumns: [new ORM\JoinColumn(name: "id_Film", referencedColumnName: "id_Film")])]
    private $films;

    public function __construct() {
        $this->films = new ArrayCollection();
    }

    public function getIdCommande(): ?int { return $this->id_Commande; }
    public function getDateCommande(): ?\DateTimeInterface { return $this->date_Commande; }
    public function setDateCommande(\DateTimeInterface $date_Commande): self { $this->date_Commande = $date_Commande; return $this; }
    public function getCompte(): ?Compte { return $this->compte; }
    public function setCompte(?Compte $compte): self { $this->compte = $compte; return $this; }
    public function getFilms(): Collection { return $this->films; }
}

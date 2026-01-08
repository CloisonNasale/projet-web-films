<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity]
#[ORM\Table(name: "compte")]
#[UniqueEntity(fields: ['mail'], message: 'Cet email est déjà utilisé.')]
class Compte implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: "integer", name: "id_Compte")]
    #[ORM\GeneratedValue]
    private $id_Compte;

    #[ORM\Column(type: "string", length: 50)]
    private $nom;

    #[ORM\Column(type: "string", length: 50)]
    private $prenom;

    #[ORM\Column(type: "string", length: 100, unique: true)]
    private $mail;

    #[ORM\Column(type: "json")]
    private array $roles = [];

    #[ORM\Column(type: "string", length: 255)]
    private $motdepasse;

    #[ORM\Column(type: "string", length: 20, nullable: true)]
    private $telephone;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $pdp;

    #[ORM\ManyToMany(targetEntity: Films::class, inversedBy: "comptesFavoris")]
    #[ORM\JoinTable(name: "favoris", joinColumns: [new ORM\JoinColumn(name: "id_Compte", referencedColumnName: "id_Compte")], inverseJoinColumns: [new ORM\JoinColumn(name: "id_Film", referencedColumnName: "id_Film")])]
    private $favoris;

    #[ORM\ManyToMany(targetEntity: Films::class, inversedBy: "comptesPanier")]
    #[ORM\JoinTable(name: "panier", joinColumns: [new ORM\JoinColumn(name: "id_Compte", referencedColumnName: "id_Compte")], inverseJoinColumns: [new ORM\JoinColumn(name: "id_Film", referencedColumnName: "id_Film")])]
    private $panier;

    #[ORM\OneToMany(targetEntity: Commandes::class, mappedBy: "compte")]
    private $commandes;

    public function __construct()
    {
        $this->favoris = new ArrayCollection();
        $this->panier = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    public function getIdCompte(): ?int
    {
        return $this->id_Compte;
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
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }
    public function getMail(): ?string
    {
        return $this->mail;
    }
    public function setMail(string $mail): self
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->mail;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->motdepasse;
    }

    public function setPassword(string $password): self
    {
        $this->motdepasse = $password;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }
    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }
    public function getPdp(): ?string
    {
        return $this->pdp;
    }
    public function setPdp(?string $pdp): self
    {
        $this->pdp = $pdp;
        return $this;
    }
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }
    public function getPanier(): Collection
    {
        return $this->panier;
    }
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addFavori(Films $film): self
    {
        if (!$this->favoris->contains($film)) {
            $this->favoris->add($film);
        }

        return $this;
    }

    public function removeFavori(Films $film): self
    {
        $this->favoris->removeElement($film);
        return $this;
    }

}

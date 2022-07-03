<?php
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Column(type:'integer')]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Agence::class, inversedBy: "userAgence")]
    private $agence;

    #[ORM\OneToMany(targetEntity: Agence::class, mappedBy: "admin")]
    private $adminAgence;

    #[ORM\Column(type:'text')]
    private $token;

    public function __construct()
    {
        $this->adminAgence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAgence(): ?int
    {
        return $this->idAgence;
    }

    public function setIdAgence(int $idAgence): self
    {
        $this->idAgence = $idAgence;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * @return Collection<int, Agence>
     */
    public function getAdminAgence(): Collection
    {
        return $this->adminAgence;
    }

    public function addAdminAgence(Agence $adminAgence): self
    {
        if (!$this->adminAgence->contains($adminAgence)) {
            $this->adminAgence[] = $adminAgence;
            $adminAgence->setAdmin($this);
        }

        return $this;
    }

    public function removeAdminAgence(Agence $adminAgence): self
    {
        if ($this->adminAgence->removeElement($adminAgence)) {
            // set the owning side to null (unless already changed)
            if ($adminAgence->getAdmin() === $this) {
                $adminAgence->setAdmin(null);
            }
        }

        return $this;
    }
}
<?php
namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgenceRepository::class)]
class Agence
{
    #[ORM\Column(type:'integer')]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "adminAgence")]
    private $admin;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: "agence")]
    private $userAgence;

    #[ORM\Column(type:'string', length: 255)]
    private $lieu;

    public function __construct()
    {
        $this->userAgence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getAdmin(): ?User
    {
        return $this->admin;
    }

    public function setAdmin(?User $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserAgence(): Collection
    {
        return $this->userAgence;
    }

    public function addUserAgence(User $userAgence): self
    {
        if (!$this->userAgence->contains($userAgence)) {
            $this->userAgence[] = $userAgence;
            $userAgence->setAgence($this);
        }

        return $this;
    }

    public function removeUserAgence(User $userAgence): self
    {
        if ($this->userAgence->removeElement($userAgence)) {
            // set the owning side to null (unless already changed)
            if ($userAgence->getAgence() === $this) {
                $userAgence->setAgence(null);
            }
        }

        return $this;
    }


}
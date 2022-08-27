<?php
namespace App\Entity;

    use App\Repository\UserRepository;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;
    use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class Role
{
    #[ORM\Column(type:'integer')]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: "role")]
    private $userRole;

    #[ORM\Column(type:'string', length: 255)]
    private $name;

    public function __construct()
    {
        $this->userRole = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserRole(): Collection
    {
        return $this->userRole;
    }

    public function addUserRole(User $userRole): self
    {
        if (!$this->userRole->contains($userRole)) {
            $this->userRole[] = $userRole;
            $userRole->setRole($this);
        }

        return $this;
    }

    public function removeUserRole(User $userRole): self
    {
        if ($this->userRole->removeElement($userRole)) {
            // set the owning side to null (unless already changed)
            if ($userRole->getRole() === $this) {
                $userRole->setRole(null);
            }
        }

        return $this;
    }



}
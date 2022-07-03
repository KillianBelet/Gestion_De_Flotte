<?php
namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Column(type:'integer')]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\Column(type:'string', length: 255)]
    private $model;

    #[ORM\Column(type:'boolean')]
    private $disponibilite;

    #[ORM\Column(type:'integer')]
    private $idFournisseur;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?int
    {
        return $this->model;
    }

    public function setModel(int $model): self
    {
        $this->model = $model;

        return $this;
    }


    public function getIdFournisseur(): ?string
    {
        return $this->idFournisseur;
    }

    public function setIdFournisseur(string $idFournisseur): self
    {
        $this->idFournisseur = $idFournisseur;

        return $this;
    }

    public function isDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }
}
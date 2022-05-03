<?php

namespace App\Entity;

use App\Repository\RamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RamRepository::class)]
class Ram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\Column(type: 'integer')]
    private $vitesse_horloge;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_memoire;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2)]
    private $prix_ram;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getVitesseHorloge(): ?int
    {
        return $this->vitesse_horloge;
    }

    public function setVitesseHorloge(int $vitesse_horloge): self
    {
        $this->vitesse_horloge = $vitesse_horloge;

        return $this;
    }

    public function getTypeMemoire(): ?string
    {
        return $this->type_memoire;
    }

    public function setTypeMemoire(string $type_memoire): self
    {
        $this->type_memoire = $type_memoire;

        return $this;
    }

    public function getPrixRam(): ?string
    {
        return $this->prix_ram;
    }

    public function setPrixRam(string $prix_ram): self
    {
        $this->prix_ram = $prix_ram;

        return $this;
    }
}

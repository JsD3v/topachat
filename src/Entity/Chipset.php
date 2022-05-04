<?php

namespace App\Entity;

use App\Repository\ChipsetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChipsetRepository::class)]
class Chipset
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_chipset;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChipset(): ?string
    {
        return $this->nom_chipset;
    }

    public function setNomChipset(string $nom_chipset): self
    {
        $this->nom_chipset = $nom_chipset;

        return $this;
    }
}

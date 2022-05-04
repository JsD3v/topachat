<?php

namespace App\Entity;

use App\Repository\FabricantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FabricantRepository::class)]
class Fabricant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_fabricant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFabricant(): ?string
    {
        return $this->nom_fabricant;
    }

    public function setNomFabricant(string $nom_fabricant): self
    {
        $this->nom_fabricant = $nom_fabricant;

        return $this;
    }
}

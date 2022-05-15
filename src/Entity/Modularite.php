<?php

namespace App\Entity;

use App\Repository\ModulariteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModulariteRepository::class)]
class Modularite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_modularite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomModularite(): ?string
    {
        return $this->nom_modularite;
    }

    public function setNomModularite(string $nom_modularite): self
    {
        $this->nom_modularite = $nom_modularite;

        return $this;
    }
}

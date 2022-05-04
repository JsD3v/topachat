<?php

namespace App\Entity;

use App\Repository\ConnecteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConnecteurRepository::class)]
class Connecteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_connecteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomConnecteur(): ?string
    {
        return $this->nom_connecteur;
    }

    public function setNomConnecteur(string $nom_connecteur): self
    {
        $this->nom_connecteur = $nom_connecteur;

        return $this;
    }
}

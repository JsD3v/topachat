<?php

namespace App\Entity;

use App\Repository\ConfigurationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConfigurationRepository::class)]
class Configuration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Processeur::class, inversedBy: 'configurations')]
    private $processeur;

    #[ORM\ManyToOne(targetEntity: CarteMere::class, inversedBy: 'configurations')]
    private $carte_mere;

    #[ORM\ManyToOne(targetEntity: Ram::class, inversedBy: 'configurations')]
    private $ram;

    #[ORM\ManyToOne(targetEntity: Alimentation::class, inversedBy: 'configurations')]
    private $alimentation;

    #[ORM\ManyToOne(targetEntity: CarteGraphique::class, inversedBy: 'configurations')]
    private $carte_graphique;

    #[ORM\ManyToOne(targetEntity: Stockage::class, inversedBy: 'configurations')]
    private $stockage;

    #[ORM\ManyToOne(targetEntity: Ventirad::class, inversedBy: 'configurations')]
    private $ventirad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProcesseur(): ?Processeur
    {
        return $this->processeur;
    }

    public function setProcesseur(?Processeur $processeur): self
    {
        $this->processeur = $processeur;

        return $this;
    }

    public function getCarteMere(): ?CarteMere
    {
        return $this->carte_mere;
    }

    public function setCarteMere(?CarteMere $carte_mere): self
    {
        $this->carte_mere = $carte_mere;

        return $this;
    }

    public function getRam(): ?Ram
    {
        return $this->ram;
    }

    public function setRam(?Ram $ram): self
    {
        $this->ram = $ram;

        return $this;
    }

    public function getAlimentation(): ?Alimentation
    {
        return $this->alimentation;
    }

    public function setAlimentation(?Alimentation $alimentation): self
    {
        $this->alimentation = $alimentation;

        return $this;
    }

    public function getCarteGraphique(): ?CarteGraphique
    {
        return $this->carte_graphique;
    }

    public function setCarteGraphique(?CarteGraphique $carte_graphique): self
    {
        $this->carte_graphique = $carte_graphique;

        return $this;
    }

    public function getStockage(): ?Stockage
    {
        return $this->stockage;
    }

    public function setStockage(?Stockage $stockage): self
    {
        $this->stockage = $stockage;

        return $this;
    }

    public function getVentirad(): ?Ventirad
    {
        return $this->ventirad;
    }

    public function setVentirad(?Ventirad $ventirad): self
    {
        $this->ventirad = $ventirad;

        return $this;
    }
}

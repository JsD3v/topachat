<?php

namespace App\Entity;

use App\Repository\AlimentationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentationRepository::class)]
class Alimentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_alimentation;

    #[ORM\Column(type: 'integer')]
    private $voltage;

    #[ORM\Column(type: 'integer')]
    private $watt;

    #[ORM\Column(type: 'integer')]
    private $nombre_connecteur;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2)]
    private $prix_alimentation;

    #[ORM\OneToMany(mappedBy: 'alimentation', targetEntity: Configuration::class)]
    private $configurations;

    public function __construct()
    {
        $this->configurations = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom_alimentation;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAlimentation(): ?string
    {
        return $this->nom_alimentation;
    }

    public function setNomAlimentation(string $nom_alimentation): self
    {
        $this->nom_alimentation = $nom_alimentation;

        return $this;
    }

    public function getVoltage(): ?int
    {
        return $this->voltage;
    }

    public function setVoltage(int $voltage): self
    {
        $this->voltage = $voltage;

        return $this;
    }

    public function getWatt(): ?int
    {
        return $this->watt;
    }

    public function setWatt(int $watt): self
    {
        $this->watt = $watt;

        return $this;
    }

    public function getNombreConnecteur(): ?int
    {
        return $this->nombre_connecteur;
    }

    public function setNombreConnecteur(int $nombre_connecteur): self
    {
        $this->nombre_connecteur = $nombre_connecteur;

        return $this;
    }

    public function getPrixAlimentation(): ?string
    {
        return $this->prix_alimentation;
    }

    public function setPrixAlimentation(string $prix_alimentation): self
    {
        $this->prix_alimentation = $prix_alimentation;

        return $this;
    }

    /**
     * @return Collection<int, Configuration>
     */
    public function getConfigurations(): Collection
    {
        return $this->configurations;
    }

    public function addConfiguration(Configuration $configuration): self
    {
        if (!$this->configurations->contains($configuration)) {
            $this->configurations[] = $configuration;
            $configuration->setAlimentation($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->removeElement($configuration)) {
            // set the owning side to null (unless already changed)
            if ($configuration->getAlimentation() === $this) {
                $configuration->setAlimentation(null);
            }
        }

        return $this;
    }
}

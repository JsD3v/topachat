<?php

namespace App\Entity;

use App\Repository\StockageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockageRepository::class)]
class Stockage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_stockage;

    #[ORM\Column(type: 'integer')]
    private $capacite;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ssd;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $hdd;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2)]
    private $prix_stockage;

    #[ORM\OneToMany(mappedBy: 'stockage', targetEntity: Configuration::class)]
    private $configurations;

    public function __construct()
    {
        $this->configurations = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom_stockage;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStockage(): ?string
    {
        return $this->nom_stockage;
    }

    public function setNomStockage(string $nom_stockage): self
    {
        $this->nom_stockage = $nom_stockage;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getSsd(): ?bool
    {
        return $this->ssd;
    }

    public function setSsd(?bool $ssd): self
    {
        $this->ssd = $ssd;

        return $this;
    }

    public function getHdd(): ?bool
    {
        return $this->hdd;
    }

    public function setHdd(?bool $hdd): self
    {
        $this->hdd = $hdd;

        return $this;
    }

    public function getPrixStockage(): ?string
    {
        return $this->prix_stockage;
    }

    public function setPrixStockage(string $prix_stockage): self
    {
        $this->prix_stockage = $prix_stockage;

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
            $configuration->setStockage($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->removeElement($configuration)) {
            // set the owning side to null (unless already changed)
            if ($configuration->getStockage() === $this) {
                $configuration->setStockage(null);
            }
        }

        return $this;
    }
}

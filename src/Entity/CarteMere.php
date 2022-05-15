<?php

namespace App\Entity;

use App\Repository\CarteMereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteMereRepository::class)]
class CarteMere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_carte_mere;

    #[ORM\Column(type: 'string', length: 255)]
    private $memoire_max;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $wifi;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ethernet;

    #[ORM\Column(type: 'string', length: 50)]
    private $voltage;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2)]
    private $prix_carte_mere;

    #[ORM\OneToMany(mappedBy: 'carte_mere', targetEntity: Configuration::class)]
    private $configurations;

    public function __construct()
    {
        $this->configurations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __ToString(){
        return $this->nom_carte_mere;
    }

    public function getNomCarteMere(): ?string
    {
        return $this->nom_carte_mere;
    }

    public function setNomCarteMere(string $nom_carte_mere): self
    {
        $this->nom_carte_mere = $nom_carte_mere;

        return $this;
    }

    public function getMemoireMax(): ?string
    {
        return $this->memoire_max;
    }

    public function setMemoireMax(string $memoire_max): self
    {
        $this->memoire_max = $memoire_max;

        return $this;
    }

    public function getWifi(): ?bool
    {
        return $this->wifi;
    }

    public function setWifi(?bool $wifi): self
    {
        $this->wifi = $wifi;

        return $this;
    }

    public function getEthernet(): ?bool
    {
        return $this->ethernet;
    }

    public function setEthernet(?bool $ethernet): self
    {
        $this->ethernet = $ethernet;

        return $this;
    }

    public function getVoltage(): ?string
    {
        return $this->voltage;
    }

    public function setVoltage(string $voltage): self
    {
        $this->voltage = $voltage;

        return $this;
    }

    public function getPrixCarteMere(): ?string
    {
        return $this->prix_carte_mere;
    }

    public function setPrixCarteMere(string $prix_carte_mere): self
    {
        $this->prix_carte_mere = $prix_carte_mere;

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
            $configuration->setCarteMere($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->removeElement($configuration)) {
            // set the owning side to null (unless already changed)
            if ($configuration->getCarteMere() === $this) {
                $configuration->setCarteMere(null);
            }
        }

        return $this;
    }
}

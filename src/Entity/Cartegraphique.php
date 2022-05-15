<?php

namespace App\Entity;

use App\Repository\CartegraphiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartegraphiqueRepository::class)]
class Cartegraphique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_carte_graphique;

    #[ORM\Column(type: 'integer')]
    private $benchmark;

    #[ORM\Column(type: 'string', length: 50)]
    private $technologie;

    #[ORM\Column(type: 'integer')]
    private $vram;

    #[ORM\Column(type: 'string', length: 50)]
    private $generation;

    #[ORM\Column(type: 'integer')]
    private $consommation_carte_graphique;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2)]
    private $prix_carte_graphique;

    #[ORM\OneToMany(mappedBy: 'carte_graphique', targetEntity: Configuration::class)]
    private $configurations;

    public function __construct()
    {
        $this->configurations = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nom_carte_graphique;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCarteGraphique(): ?string
    {
        return $this->nom_carte_graphique;
    }

    public function setNomCarteGraphique(string $nom_carte_graphique): self
    {
        $this->nom_carte_graphique = $nom_carte_graphique;

        return $this;
    }

    public function getBenchmark(): ?int
    {
        return $this->benchmark;
    }

    public function setBenchmark(int $benchmark): self
    {
        $this->benchmark = $benchmark;

        return $this;
    }

    public function getTechnologie(): ?string
    {
        return $this->technologie;
    }

    public function setTechnologie(string $technologie): self
    {
        $this->technologie = $technologie;

        return $this;
    }

    public function getVram(): ?int
    {
        return $this->vram;
    }

    public function setVram(int $vram): self
    {
        $this->vram = $vram;

        return $this;
    }

    public function getGeneration(): ?string
    {
        return $this->generation;
    }

    public function setGeneration(string $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getConsommationCarteGraphique(): ?int
    {
        return $this->consommation_carte_graphique;
    }

    public function setConsommationCarteGraphique(int $consommation_carte_graphique): self
    {
        $this->consommation_carte_graphique = $consommation_carte_graphique;

        return $this;
    }

    public function getPrixCarteGraphique(): ?string
    {
        return $this->prix_carte_graphique;
    }

    public function setPrixCarteGraphique(string $prix_carte_graphique): self
    {
        $this->prix_carte_graphique = $prix_carte_graphique;

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
            $configuration->setCarteGraphique($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->removeElement($configuration)) {
            // set the owning side to null (unless already changed)
            if ($configuration->getCarteGraphique() === $this) {
                $configuration->setCarteGraphique(null);
            }
        }

        return $this;
    }
}

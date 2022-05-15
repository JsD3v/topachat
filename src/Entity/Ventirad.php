<?php

namespace App\Entity;

use App\Repository\VentiradRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentiradRepository::class)]
class Ventirad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_ventirad;

    #[ORM\Column(type: 'integer')]
    private $taille;

    #[ORM\Column(type: 'integer')]
    private $refroidissement_max;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2)]
    private $prix_ventirad;

    #[ORM\OneToMany(mappedBy: 'ventirad', targetEntity: Configuration::class)]
    private $configurations;

    public function __construct()
    {
        $this->configurations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->nom_ventirad;
    }

    public function getNomVentirad(): ?string
    {
        return $this->nom_ventirad;
    }

    public function setNomVentirad(string $nom_ventirad): self
    {
        $this->nom_ventirad = $nom_ventirad;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getRefroidissementMax(): ?int
    {
        return $this->refroidissement_max;
    }

    public function setRefroidissementMax(int $refroidissement_max): self
    {
        $this->refroidissement_max = $refroidissement_max;

        return $this;
    }

    public function getPrixVentirad(): ?string
    {
        return $this->prix_ventirad;
    }

    public function setPrixVentirad(string $prix_ventirad): self
    {
        $this->prix_ventirad = $prix_ventirad;

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
            $configuration->setVentirad($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->removeElement($configuration)) {
            // set the owning side to null (unless already changed)
            if ($configuration->getVentirad() === $this) {
                $configuration->setVentirad(null);
            }
        }

        return $this;
    }
}

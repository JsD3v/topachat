<?php
declare(strict_types=1);
namespace App\Entity;

use App\Repository\ProcesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcesseurRepository::class)]
class Processeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $nom_processeur;

    #[ORM\Column(type: 'integer')]
    private ?int $nombre_de_coeur;

    #[ORM\Column(type: 'integer')]
    private ?int $memoire_cache;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?string $vitesse_horloge;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $generation;

    #[ORM\Column(type: 'integer')]
    private ?int $consommation_processeur;

    #[ORM\OneToMany(mappedBy: 'processeur', targetEntity: Configuration::class)]
    private Collection $configurations;

    public function __construct()
    {
        $this->configurations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(){
        return $this->nom_processeur;
    }

    public function getNomProcesseur(): ?string
    {
        return $this->nom_processeur;
    }

    public function setNomProcesseur(string $nom_processeur): self
    {
        $this->nom_processeur = $nom_processeur;

        return $this;
    }

    public function getNombreDeCoeur(): ?int
    {
        return $this->nombre_de_coeur;
    }

    public function setNombreDeCoeur(int $nombre_de_coeur): self
    {
        $this->nombre_de_coeur = $nombre_de_coeur;

        return $this;
    }

    public function getMemoireCache(): ?int
    {
        return $this->memoire_cache;
    }

    public function setMemoireCache(int $memoire_cache): self
    {
        $this->memoire_cache = $memoire_cache;

        return $this;
    }

    public function getVitesseHorloge(): ?string
    {
        return $this->vitesse_horloge;
    }

    public function setVitesseHorloge(string $vitesse_horloge): self
    {
        $this->vitesse_horloge = $vitesse_horloge;

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

    public function getConsommationProcesseur(): ?int
    {
        return $this->consommation_processeur;
    }

    public function setConsommationProcesseur(int $consommation_processeur): self
    {
        $this->consommation_processeur = $consommation_processeur;

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
            $configuration->setProcesseur($this);
        }

        return $this;
    }

    public function removeConfiguration(Configuration $configuration): self
    {
        if ($this->configurations->removeElement($configuration)) {
            // set the owning side to null (unless already changed)
            if ($configuration->getProcesseur() === $this) {
                $configuration->setProcesseur(null);
            }
        }

        return $this;
    }
}

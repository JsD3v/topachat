<?php

namespace App\Entity;

use App\Repository\ProcesseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcesseurRepository::class)]
class Processeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_processeur;

    #[ORM\Column(type: 'integer')]
    private $nombre_de_coeur;

    #[ORM\Column(type: 'integer')]
    private $memoire_cache;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $vitesse_horloge;

    #[ORM\Column(type: 'string', length: 255)]
    private $generation;

    #[ORM\Column(type: 'integer')]
    private $consommation_processeur;

    public function getId(): ?int
    {
        return $this->id;
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
}

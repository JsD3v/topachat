<?php

namespace App\Entity;

use App\Repository\CertificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertificationRepository::class)]
class Certification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_certification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCertification(): ?string
    {
        return $this->nom_certification;
    }

    public function setNomCertification(string $nom_certification): self
    {
        $this->nom_certification = $nom_certification;

        return $this;
    }
}

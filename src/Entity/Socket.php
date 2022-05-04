<?php

namespace App\Entity;

use App\Repository\SocketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocketRepository::class)]
class Socket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_socket;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSocket(): ?string
    {
        return $this->nom_socket;
    }

    public function setNomSocket(string $nom_socket): self
    {
        $this->nom_socket = $nom_socket;

        return $this;
    }
}

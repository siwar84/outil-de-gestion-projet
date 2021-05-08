<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $titre;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $Description;

    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $DateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $DateFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $type;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $Taux_avancement;
    public function __construct()
    {
        $this->DateDebut = new \DateTime();
        $this->DateFin =new \DateTime();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDateDebut(): ?DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTauxAvancement(): ?int
    {
        return $this->Taux_avancement;
    }

    public function setTauxAvancement(int $Taux_avancement): self
    {
        $this->Taux_avancement = $Taux_avancement;

        return $this;
    }
}

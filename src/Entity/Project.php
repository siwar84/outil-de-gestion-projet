<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
    private ?string $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $Clé;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $Modéle;

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
    private ?string $Etat;
    public function __construct()
    {
        $this->DateDebut = new \DateTime();
        $this->DateFin =new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getClé(): ?string
    {
        return $this->Clé;
    }

    public function setCl(string $Clé): self
    {
        $this->Clé = $Clé;

        return $this;
    }

    public function getModéle(): ?string
    {
        return $this->Modéle;
    }

    public function setModéle(string $Modéle): self
    {
        $this->Modéle = $Modéle;

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

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\EdiRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EdiRepository::class)]
class Edi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numero_voyage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateChargement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    private ?string $poids = null;

    #[ORM\Column(nullable: true)]
    private ?int $qPalettes = null;

    #[ORM\Column(nullable: true)]
    private ?int $colis = null;

    #[ORM\Column(nullable: true)]
    private ?int $facturation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $rdvOblig = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column]
    private ?bool $is_done = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'edis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DonneurDOrdre $donneurDOrdre = null;

    #[ORM\ManyToOne(inversedBy: 'edis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumeroVoyage(): ?string
    {
        return $this->numero_voyage;
    }

    public function setNumeroVoyage(?string $numero_voyage): self
    {
        $this->numero_voyage = $numero_voyage;

        return $this;
    }

    public function getDateChargement(): ?\DateTimeInterface
    {
        return $this->dateChargement;
    }

    public function setDateChargement(\DateTimeInterface $dateChargement): self
    {
        $this->dateChargement = $dateChargement;

        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getQPalettes(): ?int
    {
        return $this->qPalettes;
    }

    public function setQPalettes(?int $qPalettes): self
    {
        $this->qPalettes = $qPalettes;

        return $this;
    }

    public function getColis(): ?int
    {
        return $this->colis;
    }

    public function setColis(?int $colis): self
    {
        $this->colis = $colis;

        return $this;
    }

    public function getFacturation(): ?int
    {
        return $this->facturation;
    }

    public function setFacturation(?int $facturation): self
    {
        $this->facturation = $facturation;

        return $this;
    }

    public function isRdvOblig(): ?bool
    {
        return $this->rdvOblig;
    }

    public function setRdvOblig(?bool $rdvOblig): self
    {
        $this->rdvOblig = $rdvOblig;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function isIsDone(): ?bool
    {
        return $this->is_done;
    }

    public function setIsDone(bool $is_done): self
    {
        $this->is_done = $is_done;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getDonneurDOrdre(): ?DonneurDOrdre
    {
        return $this->donneurDOrdre;
    }

    public function setDonneurDOrdre(?DonneurDOrdre $donneurDOrdre): self
    {
        $this->donneurDOrdre = $donneurDOrdre;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

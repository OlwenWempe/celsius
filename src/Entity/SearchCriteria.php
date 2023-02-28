<?php

namespace App\Entity;

use App\Repository\SearchCriteriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SearchCriteriaRepository::class)]
class SearchCriteria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $date_chargement = null;

    #[ORM\Column(length: 255)]
    private ?string $chargeur = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_commande = null;

    #[ORM\Column(length: 255)]
    private ?string $livreur = null;

    #[ORM\Column(length: 255)]
    private ?string $colis = null;

    #[ORM\Column(length: 255)]
    private ?string $poids = null;

    #[ORM\Column(length: 255)]
    private ?string $nbr_pal = null;

    #[ORM\Column(length: 255)]
    private ?string $date_livraison = null;

    #[ORM\Column(length: 255)]
    private ?string $commentaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $champ_opt_1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $champ_opt_2 = null;

    #[ORM\ManyToOne(inversedBy: 'search_criteria')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DonneurDOrdre $donneurDOrdre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateChargement(): ?string
    {
        return $this->date_chargement;
    }

    public function setDateChargement(string $date_chargement): self
    {
        $this->date_chargement = $date_chargement;

        return $this;
    }

    public function getChargeur(): ?string
    {
        return $this->chargeur;
    }

    public function setChargeur(string $chargeur): self
    {
        $this->chargeur = $chargeur;

        return $this;
    }

    public function getNumeroCommande(): ?string
    {
        return $this->numero_commande;
    }

    public function setNumeroCommande(string $numero_commande): self
    {
        $this->numero_commande = $numero_commande;

        return $this;
    }

    public function getLivreur(): ?string
    {
        return $this->livreur;
    }

    public function setLivreur(string $livreur): self
    {
        $this->livreur = $livreur;

        return $this;
    }

    public function getColis(): ?string
    {
        return $this->colis;
    }

    public function setColis(string $colis): self
    {
        $this->colis = $colis;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getNbrPal(): ?string
    {
        return $this->nbr_pal;
    }

    public function setNbrPal(string $nbr_pal): self
    {
        $this->nbr_pal = $nbr_pal;

        return $this;
    }

    public function getDateLivraison(): ?string
    {
        return $this->date_livraison;
    }

    public function setDateLivraison(string $date_livraison): self
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getChampOpt1(): ?string
    {
        return $this->champ_opt_1;
    }

    public function setChampOpt1(?string $champ_opt_1): self
    {
        $this->champ_opt_1 = $champ_opt_1;

        return $this;
    }

    public function getChampOpt2(): ?string
    {
        return $this->champ_opt_2;
    }

    public function setChampOpt2(?string $champ_opt_2): self
    {
        $this->champ_opt_2 = $champ_opt_2;

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
}

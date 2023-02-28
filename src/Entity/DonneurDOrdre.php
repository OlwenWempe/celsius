<?php

namespace App\Entity;

use App\Repository\DonneurDOrdreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonneurDOrdreRepository::class)]
class DonneurDOrdre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'donneurDOrdre', targetEntity: SearchCriteria::class, orphanRemoval: true)]
    private Collection $search_criteria;

    #[ORM\OneToMany(mappedBy: 'donneurDOrdre', targetEntity: Edi::class, orphanRemoval: true)]
    private Collection $edis;

    public function __construct()
    {
        $this->search_criteria = new ArrayCollection();
        $this->edis = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, SearchCriteria>
     */
    public function getSearchCriteria(): Collection
    {
        return $this->search_criteria;
    }

    public function addSearchCriterion(SearchCriteria $searchCriterion): self
    {
        if (!$this->search_criteria->contains($searchCriterion)) {
            $this->search_criteria->add($searchCriterion);
            $searchCriterion->setDonneurDOrdre($this);
        }

        return $this;
    }

    public function removeSearchCriterion(SearchCriteria $searchCriterion): self
    {
        if ($this->search_criteria->removeElement($searchCriterion)) {
            // set the owning side to null (unless already changed)
            if ($searchCriterion->getDonneurDOrdre() === $this) {
                $searchCriterion->setDonneurDOrdre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Edi>
     */
    public function getEdis(): Collection
    {
        return $this->edis;
    }

    public function addEdi(Edi $edi): self
    {
        if (!$this->edis->contains($edi)) {
            $this->edis->add($edi);
            $edi->setDonneurDOrdre($this);
        }

        return $this;
    }

    public function removeEdi(Edi $edi): self
    {
        if ($this->edis->removeElement($edi)) {
            // set the owning side to null (unless already changed)
            if ($edi->getDonneurDOrdre() === $this) {
                $edi->setDonneurDOrdre(null);
            }
        }

        return $this;
    }
}

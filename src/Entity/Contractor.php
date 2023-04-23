<?php

namespace App\Entity;

use App\Repository\ContractorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractorRepository::class)]
class Contractor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'contractors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SearchCriteria $searchCriteria = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ReflexEntries $reflexEntries = null;

    #[ORM\ManyToMany(targetEntity: Exception::class, inversedBy: 'contractors')]
    private Collection $exception;

    public function __construct()
    {
        $this->exception = new ArrayCollection();
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

    public function getSearchCriteria(): ?SearchCriteria
    {
        return $this->searchCriteria;
    }

    public function setSearchCriteria(?SearchCriteria $searchCriteria): self
    {
        $this->searchCriteria = $searchCriteria;

        return $this;
    }

    public function getReflexEntries(): ?ReflexEntries
    {
        return $this->reflexEntries;
    }

    public function setReflexEntries(?ReflexEntries $reflexEntries): self
    {
        $this->reflexEntries = $reflexEntries;

        return $this;
    }

    /**
     * @return Collection<int, Exception>
     */
    public function getException(): Collection
    {
        return $this->exception;
    }

    public function addException(Exception $exception): self
    {
        if (!$this->exception->contains($exception)) {
            $this->exception->add($exception);
        }

        return $this;
    }

    public function removeException(Exception $exception): self
    {
        $this->exception->removeElement($exception);

        return $this;
    }
}

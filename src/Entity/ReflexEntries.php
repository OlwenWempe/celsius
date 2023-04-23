<?php

namespace App\Entity;

use App\Repository\ReflexEntriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReflexEntriesRepository::class)]
class ReflexEntries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $societyCode = null;

    #[ORM\Column(length: 50)]
    private ?string $agencyCode = null;

    #[ORM\Column(length: 50)]
    private ?string $serviceCode = null;

    #[ORM\Column(length: 50)]
    private ?string $operator = null;

    #[ORM\Column(length: 50)]
    private ?string $contractor = null;

    #[ORM\OneToMany(mappedBy: 'reflexEntries', targetEntity: Contractor::class)]
    private Collection $contractors;

    public function __construct()
    {
        $this->contractors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSocietyCode(): ?string
    {
        return $this->societyCode;
    }

    public function setSocietyCode(string $societyCode): self
    {
        $this->societyCode = $societyCode;

        return $this;
    }

    public function getAgencyCode(): ?string
    {
        return $this->agencyCode;
    }

    public function setAgencyCode(string $agencyCode): self
    {
        $this->agencyCode = $agencyCode;

        return $this;
    }

    public function getServiceCode(): ?string
    {
        return $this->serviceCode;
    }

    public function setServiceCode(string $serviceCode): self
    {
        $this->serviceCode = $serviceCode;

        return $this;
    }

    public function getOperator(): ?string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): self
    {
        $this->operator = $operator;

        return $this;
    }

    public function getContractor(): ?string
    {
        return $this->contractor;
    }

    public function setContractor(string $contractor): self
    {
        $this->contractor = $contractor;

        return $this;
    }

    /**
     * @return Collection<int, Contractor>
     */
    public function getContractors(): Collection
    {
        return $this->contractors;
    }

    public function addContractor(Contractor $contractor): self
    {
        if (!$this->contractors->contains($contractor)) {
            $this->contractors->add($contractor);
            $contractor->setReflexEntries($this);
        }

        return $this;
    }

    public function removeContractor(Contractor $contractor): self
    {
        if ($this->contractors->removeElement($contractor)) {
            // set the owning side to null (unless already changed)
            if ($contractor->getReflexEntries() === $this) {
                $contractor->setReflexEntries(null);
            }
        }

        return $this;
    }
}

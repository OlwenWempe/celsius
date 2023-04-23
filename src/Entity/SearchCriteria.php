<?php

namespace App\Entity;

use App\Repository\SearchCriteriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SearchCriteriaRepository::class)]
class SearchCriteria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ChargingDatePosition = null;

    #[ORM\Column]
    private ?int $loadingLocationPosition = null;

    #[ORM\Column]
    private ?int $orderNumberPosition = null;

    #[ORM\Column]
    private ?int $deliveryLocationPosition = null;

    #[ORM\Column]
    private ?int $quantityPosition = null;

    #[ORM\Column]
    private ?int $weightPosition = null;

    #[ORM\Column]
    private ?int $paletsPosition = null;

    #[ORM\Column]
    private ?int $deliveryDatePosition = null;

    #[ORM\Column]
    private ?int $commentPosition = null;

    #[ORM\Column]
    private ?int $addField1Position = null;

    #[ORM\Column]
    private ?int $addField2Position = null;

    #[ORM\OneToMany(mappedBy: 'searchCriteria', targetEntity: Contractor::class)]
    private Collection $contractors;

    public function __construct()
    {
        $this->contractors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChargingDatePosition(): ?int
    {
        return $this->ChargingDatePosition;
    }

    public function setChargingDatePosition(int $ChargingDatePosition): self
    {
        $this->ChargingDatePosition = $ChargingDatePosition;

        return $this;
    }

    public function getLoadingLocationPosition(): ?int
    {
        return $this->loadingLocationPosition;
    }

    public function setLoadingLocationPosition(int $loadingLocationPosition): self
    {
        $this->loadingLocationPosition = $loadingLocationPosition;

        return $this;
    }

    public function getOrderNumberPosition(): ?int
    {
        return $this->orderNumberPosition;
    }

    public function setOrderNumberPosition(int $orderNumberPosition): self
    {
        $this->orderNumberPosition = $orderNumberPosition;

        return $this;
    }

    public function getDeliveryLocationPosition(): ?int
    {
        return $this->deliveryLocationPosition;
    }

    public function setDeliveryLocationPosition(int $deliveryLocationPosition): self
    {
        $this->deliveryLocationPosition = $deliveryLocationPosition;

        return $this;
    }

    public function getQuantityPosition(): ?int
    {
        return $this->quantityPosition;
    }

    public function setQuantityPosition(int $quantityPosition): self
    {
        $this->quantityPosition = $quantityPosition;

        return $this;
    }

    public function getWeightPosition(): ?int
    {
        return $this->weightPosition;
    }

    public function setWeightPosition(int $weightPosition): self
    {
        $this->weightPosition = $weightPosition;

        return $this;
    }

    public function getPaletsPosition(): ?int
    {
        return $this->paletsPosition;
    }

    public function setPaletsPosition(int $paletsPosition): self
    {
        $this->paletsPosition = $paletsPosition;

        return $this;
    }

    public function getDeliveryDatePosition(): ?int
    {
        return $this->deliveryDatePosition;
    }

    public function setDeliveryDatePosition(int $deliveryDatePosition): self
    {
        $this->deliveryDatePosition = $deliveryDatePosition;

        return $this;
    }

    public function getCommentPosition(): ?int
    {
        return $this->commentPosition;
    }

    public function setCommentPosition(int $commentPosition): self
    {
        $this->commentPosition = $commentPosition;

        return $this;
    }

    public function getAddField1Position(): ?int
    {
        return $this->addField1Position;
    }

    public function setAddField1Position(int $addField1Position): self
    {
        $this->addField1Position = $addField1Position;

        return $this;
    }

    public function getAddField2Position(): ?int
    {
        return $this->addField2Position;
    }

    public function setAddField2Position(int $addField2Position): self
    {
        $this->addField2Position = $addField2Position;

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
            $contractor->setSearchCriteria($this);
        }

        return $this;
    }

    public function removeContractor(Contractor $contractor): self
    {
        if ($this->contractors->removeElement($contractor)) {
            // set the owning side to null (unless already changed)
            if ($contractor->getSearchCriteria() === $this) {
                $contractor->setSearchCriteria(null);
            }
        }

        return $this;
    }
}

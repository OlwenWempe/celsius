<?php

namespace App\Entity;

use App\Repository\TransportOrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransportOrderRepository::class)]
class TransportOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $orderNumber = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $tripNumber = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $loadingDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $deliveryDate = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column]
    private ?int $qtyPalets = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $billingCode = null;

    #[ORM\Column]
    private ?bool $appointmentNecessity = null;

    #[ORM\Column(length: 250)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?bool $isDone = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'transportOrders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Contractor $contractor = null;

    #[ORM\ManyToOne(inversedBy: 'transportOrders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getTripNumber(): ?string
    {
        return $this->tripNumber;
    }

    public function setTripNumber(?string $tripNumber): self
    {
        $this->tripNumber = $tripNumber;

        return $this;
    }

    public function getLoadingDate(): ?\DateTimeInterface
    {
        return $this->loadingDate;
    }

    public function setLoadingDate(\DateTimeInterface $loadingDate): self
    {
        $this->loadingDate = $loadingDate;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(\DateTimeInterface $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getQtyPalets(): ?int
    {
        return $this->qtyPalets;
    }

    public function setQtyPalets(int $qtyPalets): self
    {
        $this->qtyPalets = $qtyPalets;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getBillingCode(): ?int
    {
        return $this->billingCode;
    }

    public function setBillingCode(?int $billingCode): self
    {
        $this->billingCode = $billingCode;

        return $this;
    }

    public function isAppointmentNecessity(): ?bool
    {
        return $this->appointmentNecessity;
    }

    public function setAppointmentNecessity(bool $appointmentNecessity): self
    {
        $this->appointmentNecessity = $appointmentNecessity;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function isIsDone(): ?bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getContractor(): ?Contractor
    {
        return $this->contractor;
    }

    public function setContractor(?Contractor $contractor): self
    {
        $this->contractor = $contractor;

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

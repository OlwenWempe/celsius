<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 50)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\ManyToOne]
    private ?TypeLieu $type_lieu = null;

    #[ORM\ManyToMany(targetEntity: TransportOrder::class, mappedBy: 'lieu')]
    private Collection $transportOrders;

    public function __construct()
    {
        $this->transportOrders = new ArrayCollection();
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getTypeLieu(): ?TypeLieu
    {
        return $this->type_lieu;
    }

    public function setTypeLieu(?TypeLieu $type_lieu): self
    {
        $this->type_lieu = $type_lieu;

        return $this;
    }

    /**
     * @return Collection<int, TransportOrder>
     */
    public function getTransportOrders(): Collection
    {
        return $this->transportOrders;
    }

    public function addTransportOrder(TransportOrder $transportOrder): self
    {
        if (!$this->transportOrders->contains($transportOrder)) {
            $this->transportOrders->add($transportOrder);
            $transportOrder->addLieu($this);
        }

        return $this;
    }

    public function removeTransportOrder(TransportOrder $transportOrder): self
    {
        if ($this->transportOrders->removeElement($transportOrder)) {
            $transportOrder->removeLieu($this);
        }

        return $this;
    }
}

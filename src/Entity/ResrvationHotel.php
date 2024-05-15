<?php

namespace App\Entity;

use App\Repository\ResrvationHotelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResrvationHotelRepository::class)
 */
class ResrvationHotel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="resrvationHotels")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class, inversedBy="resrvationHotels")
     */
    private $hotel;

    /**
     * @ORM\OneToOne(targetEntity=Paiement::class, inversedBy="resrvationHotel", cascade={"persist", "remove"})
     */
    private $paiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getPaiement(): ?Paiement
    {
        return $this->paiement;
    }

    public function setPaiement(?Paiement $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }
}

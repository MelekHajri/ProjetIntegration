<?php

namespace App\Entity;

use App\Repository\ReservationTourRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationTourRepository::class)
 */
class ReservationTour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservationTours")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=TourPackage::class, inversedBy="reservationTours")
     */
    private $tourPackage;

    /**
     * @ORM\OneToOne(targetEntity=Paiement::class, inversedBy="reservationTour", cascade={"persist", "remove"})
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

    public function getTourPackage(): ?TourPackage
    {
        return $this->tourPackage;
    }

    public function setTourPackage(?TourPackage $tourPackage): self
    {
        $this->tourPackage = $tourPackage;

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

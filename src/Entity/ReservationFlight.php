<?php

namespace App\Entity;

use App\Repository\ReservationFlightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationFlightRepository::class)
 */
class ReservationFlight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservationFlights")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Flight::class, inversedBy="reservationFlights")
     */
    private $flight;

    /**
     * @ORM\OneToOne(targetEntity=Paiement::class, inversedBy="reservationFlight", cascade={"persist", "remove"})
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

    public function getFlight(): ?Flight
    {
        return $this->flight;
    }

    public function setFlight(?Flight $flight): self
    {
        $this->flight = $flight;

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

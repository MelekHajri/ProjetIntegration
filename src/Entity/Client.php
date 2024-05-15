<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client extends Personne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumTel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateNaiss;

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="client")
     */
    private $reviews;

    /**
     * @ORM\OneToMany(targetEntity=ReservationTour::class, mappedBy="client")
     */
    private $reservationTours;

    /**
     * @ORM\OneToMany(targetEntity=ResrvationHotel::class, mappedBy="client")
     */
    private $resrvationHotels;

    /**
     * @ORM\OneToMany(targetEntity=ReservationFlight::class, mappedBy="client")
     */
    private $reservationFlights;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->reservationTours = new ArrayCollection();
        $this->resrvationHotels = new ArrayCollection();
        $this->reservationFlights = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumTel(): ?string
    {
        return $this->NumTel;
    }

    public function setNumTel(?string $NumTel): self
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->DateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $DateNaiss): self
    {
        $this->DateNaiss = $DateNaiss;

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setClient($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getClient() === $this) {
                $review->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationTour>
     */
    public function getReservationTours(): Collection
    {
        return $this->reservationTours;
    }

    public function addReservationTour(ReservationTour $reservationTour): self
    {
        if (!$this->reservationTours->contains($reservationTour)) {
            $this->reservationTours[] = $reservationTour;
            $reservationTour->setClient($this);
        }

        return $this;
    }

    public function removeReservationTour(ReservationTour $reservationTour): self
    {
        if ($this->reservationTours->removeElement($reservationTour)) {
            // set the owning side to null (unless already changed)
            if ($reservationTour->getClient() === $this) {
                $reservationTour->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ResrvationHotel>
     */
    public function getResrvationHotels(): Collection
    {
        return $this->resrvationHotels;
    }

    public function addResrvationHotel(ResrvationHotel $resrvationHotel): self
    {
        if (!$this->resrvationHotels->contains($resrvationHotel)) {
            $this->resrvationHotels[] = $resrvationHotel;
            $resrvationHotel->setClient($this);
        }

        return $this;
    }

    public function removeResrvationHotel(ResrvationHotel $resrvationHotel): self
    {
        if ($this->resrvationHotels->removeElement($resrvationHotel)) {
            // set the owning side to null (unless already changed)
            if ($resrvationHotel->getClient() === $this) {
                $resrvationHotel->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationFlight>
     */
    public function getReservationFlights(): Collection
    {
        return $this->reservationFlights;
    }

    public function addReservationFlight(ReservationFlight $reservationFlight): self
    {
        if (!$this->reservationFlights->contains($reservationFlight)) {
            $this->reservationFlights[] = $reservationFlight;
            $reservationFlight->setClient($this);
        }

        return $this;
    }

    public function removeReservationFlight(ReservationFlight $reservationFlight): self
    {
        if ($this->reservationFlights->removeElement($reservationFlight)) {
            // set the owning side to null (unless already changed)
            if ($reservationFlight->getClient() === $this) {
                $reservationFlight->setClient(null);
            }
        }

        return $this;
    }
}

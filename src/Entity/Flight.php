<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlightRepository::class)
 */
class Flight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDep;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateAr;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $Prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Compagnie;

    /**
     * @ORM\OneToMany(targetEntity=ReservationFlight::class, mappedBy="flight")
     */
    private $reservationFlights;

    public function __construct()
    {
        $this->reservationFlights = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDep(): ?\DateTimeInterface
    {
        return $this->DateDep;
    }

    public function setDateDep(?\DateTimeInterface $DateDep): self
    {
        $this->DateDep = $DateDep;

        return $this;
    }

    public function getDateAr(): ?\DateTimeInterface
    {
        return $this->DateAr;
    }

    public function setDateAr(?\DateTimeInterface $DateAr): self
    {
        $this->DateAr = $DateAr;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->Prix;
    }

    public function setPrix(?string $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getCompagnie(): ?string
    {
        return $this->Compagnie;
    }

    public function setCompagnie(?string $Compagnie): self
    {
        $this->Compagnie = $Compagnie;

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
            $reservationFlight->setFlight($this);
        }

        return $this;
    }

    public function removeReservationFlight(ReservationFlight $reservationFlight): self
    {
        if ($this->reservationFlights->removeElement($reservationFlight)) {
            // set the owning side to null (unless already changed)
            if ($reservationFlight->getFlight() === $this) {
                $reservationFlight->setFlight(null);
            }
        }

        return $this;
    }
}

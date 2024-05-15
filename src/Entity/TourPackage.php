<?php

namespace App\Entity;

use App\Repository\TourPackageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TourPackageRepository::class)
 */
class TourPackage
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateFin;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $Prix;

    /**
     * @ORM\OneToMany(targetEntity=ReservationTour::class, mappedBy="tourPackage")
     */
    private $reservationTours;

    public function __construct()
    {
        $this->reservationTours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(?\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

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
            $reservationTour->setTourPackage($this);
        }

        return $this;
    }

    public function removeReservationTour(ReservationTour $reservationTour): self
    {
        if ($this->reservationTours->removeElement($reservationTour)) {
            // set the owning side to null (unless already changed)
            if ($reservationTour->getTourPackage() === $this) {
                $reservationTour->setTourPackage(null);
            }
        }

        return $this;
    }
}

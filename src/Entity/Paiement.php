<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
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
    private $NomPrenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MethodePaiement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumCarte;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CodeSecurite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PaiementTotale;

    /**
     * @ORM\OneToOne(targetEntity=ReservationTour::class, mappedBy="paiement", cascade={"persist", "remove"})
     */
    private $reservationTour;

    /**
     * @ORM\OneToOne(targetEntity=ResrvationHotel::class, mappedBy="paiement", cascade={"persist", "remove"})
     */
    private $resrvationHotel;

    /**
     * @ORM\OneToOne(targetEntity=ReservationFlight::class, mappedBy="paiement", cascade={"persist", "remove"})
     */
    private $reservationFlight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenom(): ?string
    {
        return $this->NomPrenom;
    }

    public function setNomPrenom(?string $NomPrenom): self
    {
        $this->NomPrenom = $NomPrenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(?string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getMethodePaiement(): ?string
    {
        return $this->MethodePaiement;
    }

    public function setMethodePaiement(?string $MethodePaiement): self
    {
        $this->MethodePaiement = $MethodePaiement;

        return $this;
    }

    public function getNumCarte(): ?int
    {
        return $this->NumCarte;
    }

    public function setNumCarte(?int $NumCarte): self
    {
        $this->NumCarte = $NumCarte;

        return $this;
    }

    public function getCodeSecurite(): ?int
    {
        return $this->CodeSecurite;
    }

    public function setCodeSecurite(?int $CodeSecurite): self
    {
        $this->CodeSecurite = $CodeSecurite;

        return $this;
    }

    public function getPaiementTotale(): ?int
    {
        return $this->PaiementTotale;
    }

    public function setPaiementTotale(?int $PaiementTotale): self
    {
        $this->PaiementTotale = $PaiementTotale;

        return $this;
    }

    public function getReservationTour(): ?ReservationTour
    {
        return $this->reservationTour;
    }

    public function setReservationTour(?ReservationTour $reservationTour): self
    {
        // unset the owning side of the relation if necessary
        if ($reservationTour === null && $this->reservationTour !== null) {
            $this->reservationTour->setPaiement(null);
        }

        // set the owning side of the relation if necessary
        if ($reservationTour !== null && $reservationTour->getPaiement() !== $this) {
            $reservationTour->setPaiement($this);
        }

        $this->reservationTour = $reservationTour;

        return $this;
    }

    public function getResrvationHotel(): ?ResrvationHotel
    {
        return $this->resrvationHotel;
    }

    public function setResrvationHotel(?ResrvationHotel $resrvationHotel): self
    {
        // unset the owning side of the relation if necessary
        if ($resrvationHotel === null && $this->resrvationHotel !== null) {
            $this->resrvationHotel->setPaiement(null);
        }

        // set the owning side of the relation if necessary
        if ($resrvationHotel !== null && $resrvationHotel->getPaiement() !== $this) {
            $resrvationHotel->setPaiement($this);
        }

        $this->resrvationHotel = $resrvationHotel;

        return $this;
    }

    public function getReservationFlight(): ?ReservationFlight
    {
        return $this->reservationFlight;
    }

    public function setReservationFlight(?ReservationFlight $reservationFlight): self
    {
        // unset the owning side of the relation if necessary
        if ($reservationFlight === null && $this->reservationFlight !== null) {
            $this->reservationFlight->setPaiement(null);
        }

        // set the owning side of the relation if necessary
        if ($reservationFlight !== null && $reservationFlight->getPaiement() !== $this) {
            $reservationFlight->setPaiement($this);
        }

        $this->reservationFlight = $reservationFlight;

        return $this;
    }
}

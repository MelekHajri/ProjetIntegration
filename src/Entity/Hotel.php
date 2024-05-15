<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HotelRepository::class)
 */
class Hotel
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
    private $Adresse;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateArr;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateSorti;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $Prix;

    /**
     * @ORM\OneToMany(targetEntity=ResrvationHotel::class, mappedBy="hotel")
     */
    private $resrvationHotels;

    public function __construct()
    {
        $this->resrvationHotels = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getDateArr(): ?\DateTimeInterface
    {
        return $this->DateArr;
    }

    public function setDateArr(?\DateTimeInterface $DateArr): self
    {
        $this->DateArr = $DateArr;

        return $this;
    }

    public function getDateSorti(): ?\DateTimeInterface
    {
        return $this->DateSorti;
    }

    public function setDateSorti(?\DateTimeInterface $DateSorti): self
    {
        $this->DateSorti = $DateSorti;

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
            $resrvationHotel->setHotel($this);
        }

        return $this;
    }

    public function removeResrvationHotel(ResrvationHotel $resrvationHotel): self
    {
        if ($this->resrvationHotels->removeElement($resrvationHotel)) {
            // set the owning side to null (unless already changed)
            if ($resrvationHotel->getHotel() === $this) {
                $resrvationHotel->setHotel(null);
            }
        }

        return $this;
    }
}

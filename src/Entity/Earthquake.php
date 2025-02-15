<?php

namespace App\Entity;

use App\Repository\EarthquakeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EarthquakeRepository::class)]
class Earthquake
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['earthquakes.index'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $time = null;

    #[ORM\Column(length: 255)]
    #[Groups(['earthquakes.index'])]
    private ?string $latitude = null;

    #[ORM\Column(name: 'idToken', length: 255)]
    private ?string $idToken = null;

    #[ORM\Column(length: 255)]
    #[Groups(['earthquakes.index'])]
    private ?string $longitude = null;

    #[ORM\Column(length: 255)]
    private ?string $depth = null;

    #[ORM\Column(length: 255)]
    #[Groups(['earthquakes.index'])]
    private ?string $mag = null;

    #[ORM\Column(name: 'magType', length: 255, nullable: true)]
    #[Groups(['earthquakes.show'])]
    private ?string $magType = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['earthquakes.show'])]
    private ?string $nst = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['earthquakes.show'])]
    private ?string $gap = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['earthquakes.show'])]
    private ?string $dmin = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 11, scale: 10, nullable: true)]
    #[Groups(['earthquakes.show'])]
    private ?string $rms = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $net = null;

    #[ORM\Column(length: 24, nullable: true)]
    private ?string $updated = null;

    #[ORM\Column(length: 66)]
    private ?string $place = null;

    #[ORM\Column(length: 19, name: 'horizontalError', nullable: true)]
    private ?string $horizontalError = null;

    #[ORM\Column(length: 19, name: 'depthError', nullable: true)]
    private ?string $depthError = null;

    #[ORM\Column(length: 21, name: 'magError', nullable: true)]
    private ?string $magError = null;

    #[ORM\Column(length: 3, name: 'magNst', nullable: true)]
    private ?string $magNst = null;

    #[ORM\Column(length: 2, name: 'locationSource', nullable: true)]
    #[Groups(['earthquakes.index'])]
    private ?string $locationSource = null;

    #[ORM\Column(length: 2, name: 'magSource', nullable: true)]
    private ?string $magSource = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getDepth(): ?string
    {
        return $this->depth;
    }

    public function setDepth(string $depth): static
    {
        $this->depth = $depth;

        return $this;
    }

    public function getIdToken(): ?string
    {
        return $this->idToken;
    }

    public function setIdToken(string $idToken): static
    {
        $this->idToken = $idToken;

        return $this;
    }

    public function getMag(): ?string
    {
        return $this->mag;
    }

    public function setMag(string $mag): static
    {
        $this->mag = $mag;

        return $this;
    }

    public function getMagType(): ?string
    {
        return $this->magType;
    }

    public function setMagType(?string $magType): static
    {
        $this->magType = $magType;

        return $this;
    }

    public function getNst(): ?string
    {
        return $this->nst;
    }

    public function setNst(?string $nst): static
    {
        $this->nst = $nst;

        return $this;
    }

    public function getGap(): ?string
    {
        return $this->gap;
    }

    public function setGap(?string $gap): static
    {
        $this->gap = $gap;

        return $this;
    }

    public function getDmin(): ?string
    {
        return $this->dmin;
    }

    public function setDmin(?string $dmin): static
    {
        $this->dmin = $dmin;

        return $this;
    }

    public function getRms(): ?string
    {
        return $this->rms;
    }

    public function setRms(?string $rms): static
    {
        $this->rms = $rms;

        return $this;
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function setNet(?string $net): static
    {
        $this->net = $net;

        return $this;
    }

    public function setId(?string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUpdated(): ?string
    {
        return $this->updated;
    }

    public function setUpdated(?string $updated): static
    {
        $this->updated = $updated;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getHorizontalError(): ?string
    {
        return $this->horizontalError;
    }

    public function setHorizontalError(?string $horizontalError): static
    {
        $this->horizontalError = $horizontalError;

        return $this;
    }

    public function getDepthError(): ?string
    {
        return $this->depthError;
    }

    public function setDepthError(?string $depthError): static
    {
        $this->depthError = $depthError;

        return $this;
    }

    public function getMagError(): ?string
    {
        return $this->magError;
    }

    public function setMagError(?string $magError): static
    {
        $this->magError = $magError;

        return $this;
    }

    public function getMagNst(): ?string
    {
        return $this->magNst;
    }

    public function setMagNst(?string $magNst): static
    {
        $this->magNst = $magNst;

        return $this;
    }

    public function getLocationSource(): ?string
    {
        return $this->locationSource;
    }

    public function setLocationSource(?string $locationSource): static
    {
        $this->locationSource = $locationSource;

        return $this;
    }

    public function getMagSource(): ?string
    {
        return $this->magSource;
    }

    public function setMagSource(?string $magSource): static
    {
        $this->magSource = $magSource;

        return $this;
    }
}

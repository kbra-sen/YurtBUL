<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\YurtSahibiRepository")
 */
class YurtSahibi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adsoyad;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sifre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefon;

    /**
     * @ORM\Column(type="integer")
     */
    private $yurtid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $durum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdsoyad(): ?string
    {
        return $this->adsoyad;
    }

    public function setAdsoyad(string $adsoyad): self
    {
        $this->adsoyad = $adsoyad;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSifre(): ?string
    {
        return $this->sifre;
    }

    public function setSifre(string $sifre): self
    {
        $this->sifre = $sifre;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getYurtid(): ?int
    {
        return $this->yurtid;
    }

    public function setYurtid(int $yurtid): self
    {
        $this->yurtid = $yurtid;

        return $this;
    }

    public function getDurum(): ?string
    {
        return $this->durum;
    }

    public function setDurum(string $durum): self
    {
        $this->durum = $durum;

        return $this;
    }
}

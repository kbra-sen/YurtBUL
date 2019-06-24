<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\YurtRepository")
 */
class Yurt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yursahibid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sehirid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ilce;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefon;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tipid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $turid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $yil;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fiyat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $webpage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $aciklama;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $durum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $keyword;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $categoryid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getYursahibid(): ?int
    {
        return $this->yursahibid;
    }

    public function setYursahibid(?int $yursahibid): self
    {
        $this->yursahibid = $yursahibid;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(?string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getSehirid(): ?string
    {
        return $this->sehirid;
    }

    public function setSehirid(?string $sehirid): self
    {
        $this->sehirid = $sehirid;

        return $this;
    }

    public function getIlce(): ?string
    {
        return $this->ilce;
    }

    public function setIlce(?string $ilce): self
    {
        $this->ilce = $ilce;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(?string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getTipid(): ?int
    {
        return $this->tipid;
    }

    public function setTipid(?int $tipid): self
    {
        $this->tipid = $tipid;

        return $this;
    }

    public function getTurid(): ?int
    {
        return $this->turid;
    }

    public function setTurid(?int $turid): self
    {
        $this->turid = $turid;

        return $this;
    }

    public function getYil(): ?string
    {
        return $this->yil;
    }

    public function setYil(?string $yil): self
    {
        $this->yil = $yil;

        return $this;
    }

    public function getFiyat(): ?float
    {
        return $this->fiyat;
    }

    public function setFiyat(?float $fiyat): self
    {
        $this->fiyat = $fiyat;

        return $this;
    }

    public function getWebpage(): ?string
    {
        return $this->webpage;
    }

    public function setWebpage(?string $webpage): self
    {
        $this->webpage = $webpage;

        return $this;
    }

    public function getAciklama(): ?string
    {
        return $this->aciklama;
    }

    public function setAciklama(?string $aciklama): self
    {
        $this->aciklama = $aciklama;

        return $this;
    }

    public function getDurum(): ?string
    {
        return $this->durum;
    }

    public function setDurum(?string $durum): self
    {
        $this->durum = $durum;

        return $this;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(?int $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCategoryid(): ?int
    {
        return $this->categoryid;
    }

    public function setCategoryid(?int $categoryid): self
    {
        $this->categoryid = $categoryid;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}

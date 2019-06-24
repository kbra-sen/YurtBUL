<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\IletisimMesajRepository")
 */
class IletisimMesaj
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $konu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mesaj;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAd(): ?string
    {
        return $this->ad;
    }

    public function setAd(?string $ad): self
    {
        $this->ad = $ad;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getKonu(): ?string
    {
        return $this->konu;
    }

    public function setKonu(?string $konu): self
    {
        $this->konu = $konu;

        return $this;
    }

    public function getMesaj(): ?string
    {
        return $this->mesaj;
    }

    public function setMesaj(?string $mesaj): self
    {
        $this->mesaj = $mesaj;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}

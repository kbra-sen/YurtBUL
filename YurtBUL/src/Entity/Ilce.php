<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IlceRepository")
 */
class Ilce
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sehirid;

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

    public function getSehirid(): ?int
    {
        return $this->sehirid;
    }

    public function setSehirid(?int $sehirid): self
    {
        $this->sehirid = $sehirid;

        return $this;
    }
}

<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yurtid;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYurtid(): ?int
    {
        return $this->yurtid;
    }

    public function setYurtid(?int $yurtid): self
    {
        $this->yurtid = $yurtid;

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
}

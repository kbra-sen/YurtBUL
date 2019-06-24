<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavorilerimRepository")
 */
class Favorilerim
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
    private $userid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yurtid;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getYurtid(): ?int
    {
        return $this->yurtid;
    }

    public function setYurtid(?int $yurtid): self
    {
        $this->yurtid = $yurtid;

        return $this;
    }
}

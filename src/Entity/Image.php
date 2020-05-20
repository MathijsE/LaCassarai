<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
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
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kamerid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagefile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamerid(): ?Kamer
    {
        return $this->kamerid;
    }

    public function setKamerid(?Kamer $kamerid): self
    {
        $this->kamerid = $kamerid;

        return $this;
    }

    public function getImagefile(): ?string
    {
        return $this->imagefile;
    }

    public function setImagefile(?string $imagefile): self
    {
        $this->imagefile = $imagefile;

        return $this;
    }
}

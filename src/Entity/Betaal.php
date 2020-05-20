<?php

namespace App\Entity;

use App\Repository\BetaalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BetaalRepository::class)
 */
class Betaal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Reservering::class, mappedBy="betaalid", cascade={"persist", "remove"})
     */
    private $reservering;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="betaals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userid;

    /**
     * @ORM\Column(type="integer")
     */
    private $rekeningnummer;

    /**
     * @ORM\Column(type="date")
     */
    private $betaaldate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservering(): ?Reservering
    {
        return $this->reservering;
    }

    public function setReservering(Reservering $reservering): self
    {
        $this->reservering = $reservering;

        // set the owning side of the relation if necessary
        if ($reservering->getBetaalid() !== $this) {
            $reservering->setBetaalid($this);
        }

        return $this;
    }

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getRekeningnummer(): ?int
    {
        return $this->rekeningnummer;
    }

    public function setRekeningnummer(int $rekeningnummer): self
    {
        $this->rekeningnummer = $rekeningnummer;

        return $this;
    }

    public function getBetaaldate(): ?\DateTimeInterface
    {
        return $this->betaaldate;
    }

    public function setBetaaldate(\DateTimeInterface $betaaldate): self
    {
        $this->betaaldate = $betaaldate;

        return $this;
    }
}

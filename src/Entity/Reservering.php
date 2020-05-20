<?php

namespace App\Entity;

use App\Repository\ReserveringRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReserveringRepository::class)
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="reserverings")
     */
    private $kamerid;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reserverings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userid;

    /**
     * @ORM\Column(type="date")
     */
    private $checkindate;

    /**
     * @ORM\Column(type="date")
     */
    private $checkoutdate;

    /**
     * @ORM\OneToOne(targetEntity=Betaal::class, inversedBy="reservering", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $betaalid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betaalmethode;

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

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCheckindate(): ?\DateTimeInterface
    {
        return $this->checkindate;
    }

    public function setCheckindate(\DateTimeInterface $checkindate): self
    {
        $this->checkindate = $checkindate;

        return $this;
    }

    public function getCheckoutdate(): ?\DateTimeInterface
    {
        return $this->checkoutdate;
    }

    public function setCheckoutdate(\DateTimeInterface $checkoutdate): self
    {
        $this->checkoutdate = $checkoutdate;

        return $this;
    }

    public function getBetaalid(): ?Betaal
    {
        return $this->betaalid;
    }

    public function setBetaalid(Betaal $betaalid): self
    {
        $this->betaalid = $betaalid;

        return $this;
    }

    public function getBetaalmethode(): ?string
    {
        return $this->betaalmethode;
    }

    public function setBetaalmethode(string $betaalmethode): self
    {
        $this->betaalmethode = $betaalmethode;

        return $this;
    }
}

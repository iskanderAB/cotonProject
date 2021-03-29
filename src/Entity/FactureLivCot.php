<?php

namespace App\Entity;

use App\Repository\FactureLivCotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureLivCotRepository::class)
 */
class FactureLivCot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numFactLiv;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modPaie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modLiv;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datePaie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $obs;

    /**
     * @ORM\OneToMany(targetEntity=TicketPesee::class, mappedBy="factureLivCot")
     */
    private $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFactLiv(): ?string
    {
        return $this->numFactLiv;
    }

    public function setNumFactLiv(?string $numFactLiv): self
    {
        $this->numFactLiv = $numFactLiv;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getModPaie(): ?string
    {
        return $this->modPaie;
    }

    public function setModPaie(?string $modPaie): self
    {
        $this->modPaie = $modPaie;

        return $this;
    }

    public function getModLiv(): ?string
    {
        return $this->modLiv;
    }

    public function setModLiv(?string $modLiv): self
    {
        $this->modLiv = $modLiv;

        return $this;
    }

    public function getDatePaie(): ?\DateTimeInterface
    {
        return $this->datePaie;
    }

    public function setDatePaie(?\DateTimeInterface $datePaie): self
    {
        $this->datePaie = $datePaie;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * @return Collection|TicketPesee[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(TicketPesee $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setFactureLivCot($this);
        }

        return $this;
    }

    public function removeTicket(TicketPesee $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getFactureLivCot() === $this) {
                $ticket->setFactureLivCot(null);
            }
        }

        return $this;
    }
}

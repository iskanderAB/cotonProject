<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=TicketPesee::class, inversedBy="Vehicule")
     */
    private $ticketPesee;

    /**
     * @ORM\OneToMany(targetEntity=Transporteur::class, mappedBy="vehicule")
     */
    private $transporteur;

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getTicketPesee(): ?TicketPesee
    {
        return $this->ticketPesee;
    }

    public function setTicketPesee(?TicketPesee $ticketPesee): self
    {
        $this->ticketPesee = $ticketPesee;

        return $this;
    }

    /**
     * @return Collection|Transporteur[]
     */
    public function getTransporteur(): Collection
    {
        return $this->transporteur;
    }

    public function addTransporteur(Transporteur $transporteur): self
    {
        if (!$this->transporteur->contains($transporteur)) {
            $this->transporteur[] = $transporteur;
            $transporteur->setVehicule($this);
        }

        return $this;
    }

    public function removeTransporteur(Transporteur $transporteur): self
    {
        if ($this->transporteur->removeElement($transporteur)) {
            // set the owning side to null (unless already changed)
            if ($transporteur->getVehicule() === $this) {
                $transporteur->setVehicule(null);
            }
        }

        return $this;
    }

    
}

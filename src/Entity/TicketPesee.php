<?php

namespace App\Entity;

use App\Repository\TicketPeseeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketPeseeRepository::class)
 */
class TicketPesee
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
    private $numTicket;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $compagne;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numCaisse;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateP1;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateP2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $heureP1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $heureP2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $peseur;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $poidsP1;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $poidsP2;

    /**
     * @ORM\ManyToOne(targetEntity=FactureLivCot::class, inversedBy="tickets")
     */
    private $factureLivCot;

    /**
     * @ORM\OneToMany(targetEntity=Saison::class, mappedBy="ticketPesee")
     */
    private $saisons;

    /**
     * @ORM\OneToMany(targetEntity=AssociationVillagoise::class, mappedBy="ticketPesee")
     */
    private $associationVillagoises;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="ticketPesee")
     */
    private $Vehicule;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->associationVillagoises = new ArrayCollection();
        $this->Vehicule = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumTicket(): ?string
    {
        return $this->numTicket;
    }

    public function setNumTicket(?string $numTicket): self
    {
        $this->numTicket = $numTicket;

        return $this;
    }

    public function getCompagne(): ?string
    {
        return $this->compagne;
    }

    public function setCompagne(?string $compagne): self
    {
        $this->compagne = $compagne;

        return $this;
    }

    public function getNumCaisse(): ?int
    {
        return $this->numCaisse;
    }

    public function setNumCaisse(?int $numCaisse): self
    {
        $this->numCaisse = $numCaisse;

        return $this;
    }

    public function getDateP1(): ?\DateTimeInterface
    {
        return $this->dateP1;
    }

    public function setDateP1(?\DateTimeInterface $dateP1): self
    {
        $this->dateP1 = $dateP1;

        return $this;
    }

    public function getDateP2(): ?\DateTimeInterface
    {
        return $this->dateP2;
    }

    public function setDateP2(?\DateTimeInterface $dateP2): self
    {
        $this->dateP2 = $dateP2;

        return $this;
    }

    public function getHeureP1(): ?string
    {
        return $this->heureP1;
    }

    public function setHeureP1(?string $heureP1): self
    {
        $this->heureP1 = $heureP1;

        return $this;
    }

    public function getHeureP2(): ?string
    {
        return $this->heureP2;
    }

    public function setHeureP2(?string $heureP2): self
    {
        $this->heureP2 = $heureP2;

        return $this;
    }

    public function getPeseur(): ?string
    {
        return $this->peseur;
    }

    public function setPeseur(?string $peseur): self
    {
        $this->peseur = $peseur;

        return $this;
    }

    public function getPoidsP1(): ?string
    {
        return $this->poidsP1;
    }

    public function setPoidsP1(?string $poidsP1): self
    {
        $this->poidsP1 = $poidsP1;

        return $this;
    }

    public function getPoidsP2(): ?string
    {
        return $this->poidsP2;
    }

    public function setPoidsP2(?string $poidsP2): self
    {
        $this->poidsP2 = $poidsP2;

        return $this;
    }

    public function getFactureLivCot(): ?FactureLivCot
    {
        return $this->factureLivCot;
    }

    public function setFactureLivCot(?FactureLivCot $factureLivCot): self
    {
        $this->factureLivCot = $factureLivCot;

        return $this;
    }

    /**
     * @return Collection|Saison[]
     */
    public function getSaisons(): Collection
    {
        return $this->saisons;
    }

    public function addSaison(Saison $saison): self
    {
        if (!$this->saisons->contains($saison)) {
            $this->saisons[] = $saison;
            $saison->setTicketPesee($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        if ($this->saisons->removeElement($saison)) {
            // set the owning side to null (unless already changed)
            if ($saison->getTicketPesee() === $this) {
                $saison->setTicketPesee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AssociationVillagoise[]
     */
    public function getAssociationVillagoises(): Collection
    {
        return $this->associationVillagoises;
    }

    public function addAssociationVillagoise(AssociationVillagoise $associationVillagoise): self
    {
        if (!$this->associationVillagoises->contains($associationVillagoise)) {
            $this->associationVillagoises[] = $associationVillagoise;
            $associationVillagoise->setTicketPesee($this);
        }

        return $this;
    }

    public function removeAssociationVillagoise(AssociationVillagoise $associationVillagoise): self
    {
        if ($this->associationVillagoises->removeElement($associationVillagoise)) {
            // set the owning side to null (unless already changed)
            if ($associationVillagoise->getTicketPesee() === $this) {
                $associationVillagoise->setTicketPesee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicule(): Collection
    {
        return $this->Vehicule;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->Vehicule->contains($vehicule)) {
            $this->Vehicule[] = $vehicule;
            $vehicule->setTicketPesee($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->Vehicule->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getTicketPesee() === $this) {
                $vehicule->setTicketPesee(null);
            }
        }

        return $this;
    }
}

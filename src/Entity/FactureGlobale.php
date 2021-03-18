<?php

namespace App\Entity;

use App\Repository\FactureGlobaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureGlobaleRepository::class)
 */
class FactureGlobale
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
    private $numFactG;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modPaie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datePaie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $obs;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $credit;

    /**
     * @ORM\OneToMany(targetEntity=Saison::class, mappedBy="factureGlobale")
     */
    private $saisons;

    /**
     * @ORM\OneToMany(targetEntity=AssociationVillagoise::class, mappedBy="factureGlobale")
     */
    private $AssociationVillagoise;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->AssociationVillagoise = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFactG(): ?string
    {
        return $this->numFactG;
    }

    public function setNumFactG(?string $numFactG): self
    {
        $this->numFactG = $numFactG;

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

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(?float $credit): self
    {
        $this->credit = $credit;

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
            $saison->setFactureGlobale($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        if ($this->saisons->removeElement($saison)) {
            // set the owning side to null (unless already changed)
            if ($saison->getFactureGlobale() === $this) {
                $saison->setFactureGlobale(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AssociationVillagoise[]
     */
    public function getAssociationVillagoise(): Collection
    {
        return $this->AssociationVillagoise;
    }

    public function addAssociationVillagoise(AssociationVillagoise $associationVillagoise): self
    {
        if (!$this->AssociationVillagoise->contains($associationVillagoise)) {
            $this->AssociationVillagoise[] = $associationVillagoise;
            $associationVillagoise->setFactureGlobale($this);
        }

        return $this;
    }

    public function removeAssociationVillagoise(AssociationVillagoise $associationVillagoise): self
    {
        if ($this->AssociationVillagoise->removeElement($associationVillagoise)) {
            // set the owning side to null (unless already changed)
            if ($associationVillagoise->getFactureGlobale() === $this) {
                $associationVillagoise->setFactureGlobale(null);
            }
        }

        return $this;
    }
}

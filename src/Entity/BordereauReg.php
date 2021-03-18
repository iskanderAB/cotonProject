<?php

namespace App\Entity;

use App\Repository\BordereauRegRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BordereauRegRepository::class)
 */
class BordereauReg
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
    private $numBorReg;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $mntReg;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modPaie;

    /**
     * @ORM\OneToMany(targetEntity=Saison::class, mappedBy="bordereauReg")
     */
    private $saisons;

    /**
     * @ORM\ManyToMany(targetEntity=FactureLivInt::class, mappedBy="bordereauReg")
     */
    private $factureLivInts;

    /**
     * @ORM\OneToMany(targetEntity=AssociationVillagoise::class, mappedBy="bordereauReg")
     */
    private $associationVillagoises;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->factureLivInts = new ArrayCollection();
        $this->associationVillagoises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumBorReg(): ?string
    {
        return $this->numBorReg;
    }

    public function setNumBorReg(?string $numBorReg): self
    {
        $this->numBorReg = $numBorReg;

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

    public function getMntReg(): ?float
    {
        return $this->mntReg;
    }

    public function setMntReg(?float $mntReg): self
    {
        $this->mntReg = $mntReg;

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
            $saison->setBordereauReg($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        if ($this->saisons->removeElement($saison)) {
            // set the owning side to null (unless already changed)
            if ($saison->getBordereauReg() === $this) {
                $saison->setBordereauReg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FactureLivInt[]
     */
    public function getFactureLivInts(): Collection
    {
        return $this->factureLivInts;
    }

    public function addFactureLivInt(FactureLivInt $factureLivInt): self
    {
        if (!$this->factureLivInts->contains($factureLivInt)) {
            $this->factureLivInts[] = $factureLivInt;
            $factureLivInt->addBordereauReg($this);
        }

        return $this;
    }

    public function removeFactureLivInt(FactureLivInt $factureLivInt): self
    {
        if ($this->factureLivInts->removeElement($factureLivInt)) {
            $factureLivInt->removeBordereauReg($this);
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
            $associationVillagoise->setBordereauReg($this);
        }

        return $this;
    }

    public function removeAssociationVillagoise(AssociationVillagoise $associationVillagoise): self
    {
        if ($this->associationVillagoises->removeElement($associationVillagoise)) {
            // set the owning side to null (unless already changed)
            if ($associationVillagoise->getBordereauReg() === $this) {
                $associationVillagoise->setBordereauReg(null);
            }
        }

        return $this;
    }
}

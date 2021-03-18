<?php

namespace App\Entity;

use App\Repository\BordereauLivRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BordereauLivRepository::class)
 */
class BordereauLiv
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
    private $numBord;

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
     * @ORM\Column(type="date", nullable=true)
     */
    private $delLiv;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tauxRem;

    /**
     * @ORM\OneToOne(targetEntity=Besoin::class, cascade={"persist", "remove"})
     */
    private $besoin;

    /**
     * @ORM\OneToMany(targetEntity=FactureLivInt::class, mappedBy="bordereauLiv")
     */
    private $factureLivInt;

    public function __construct()
    {
        $this->factureLivInt = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumBord(): ?string
    {
        return $this->numBord;
    }

    public function setNumBord(?string $numBord): self
    {
        $this->numBord = $numBord;

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

    public function getDelLiv(): ?\DateTimeInterface
    {
        return $this->delLiv;
    }

    public function setDelLiv(?\DateTimeInterface $delLiv): self
    {
        $this->delLiv = $delLiv;

        return $this;
    }

    public function getTauxRem(): ?float
    {
        return $this->tauxRem;
    }

    public function setTauxRem(?float $tauxRem): self
    {
        $this->tauxRem = $tauxRem;

        return $this;
    }

    public function getBesoin(): ?Besoin
    {
        return $this->besoin;
    }

    public function setBesoin(?Besoin $besoin): self
    {
        $this->besoin = $besoin;

        return $this;
    }

    /**
     * @return Collection|FactureLivInt[]
     */
    public function getFactureLivInt(): Collection
    {
        return $this->factureLivInt;
    }

    public function addFactureLivInt(FactureLivInt $factureLivInt): self
    {
        if (!$this->factureLivInt->contains($factureLivInt)) {
            $this->factureLivInt[] = $factureLivInt;
            $factureLivInt->setBordereauLiv($this);
        }

        return $this;
    }

    public function removeFactureLivInt(FactureLivInt $factureLivInt): self
    {
        if ($this->factureLivInt->removeElement($factureLivInt)) {
            // set the owning side to null (unless already changed)
            if ($factureLivInt->getBordereauLiv() === $this) {
                $factureLivInt->setBordereauLiv(null);
            }
        }

        return $this;
    }
}

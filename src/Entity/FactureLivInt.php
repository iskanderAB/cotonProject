<?php

namespace App\Entity;

use App\Repository\FactureLivIntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureLivIntRepository::class)
 */
class FactureLivInt
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
    private $numFacLiv;

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
     * @ORM\ManyToOne(targetEntity=BordereauLiv::class, inversedBy="factureLivInt")
     */
    private $bordereauLiv;

    /**
     * @ORM\ManyToMany(targetEntity=BordereauReg::class, inversedBy="factureLivInts")
     */
    private $bordereauReg;

    public function __construct()
    {
        $this->bordereauReg = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFacLiv(): ?string
    {
        return $this->numFacLiv;
    }

    public function setNumFacLiv(?string $numFacLiv): self
    {
        $this->numFacLiv = $numFacLiv;

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

    public function getBordereauLiv(): ?BordereauLiv
    {
        return $this->bordereauLiv;
    }

    public function setBordereauLiv(?BordereauLiv $bordereauLiv): self
    {
        $this->bordereauLiv = $bordereauLiv;

        return $this;
    }

    /**
     * @return Collection|BordereauReg[]
     */
    public function getBordereauReg(): Collection
    {
        return $this->bordereauReg;
    }

    public function addBordereauReg(BordereauReg $bordereauReg): self
    {
        if (!$this->bordereauReg->contains($bordereauReg)) {
            $this->bordereauReg[] = $bordereauReg;
        }

        return $this;
    }

    public function removeBordereauReg(BordereauReg $bordereauReg): self
    {
        $this->bordereauReg->removeElement($bordereauReg);

        return $this;
    }
}

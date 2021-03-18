<?php

namespace App\Entity;

use App\Repository\AssociationVillagoiseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssociationVillagoiseRepository::class)
 */
class AssociationVillagoise
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
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rep;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $numFix;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $mobile;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $fax;

    /**
     * @ORM\ManyToOne(targetEntity=FactureGlobale::class, inversedBy="AssociationVillagoise")
     */
    private $factureGlobale;

    /**
     * @ORM\ManyToOne(targetEntity=Besoin::class, inversedBy="associationVillagoise")
     */
    private $besoin;

    /**
     * @ORM\ManyToOne(targetEntity=BordereauReg::class, inversedBy="associationVillagoises")
     */
    private $bordereauReg;

    /**
     * @ORM\OneToMany(targetEntity=CentreGestInt::class, mappedBy="associationVillagoise")
     */
    private $centreGestInt;

    /**
     * @ORM\ManyToOne(targetEntity=TicketPesee::class, inversedBy="associationVillagoises")
     */
    private $ticketPesee;

    public function __construct()
    {
        $this->centreGestInt = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

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

    public function getRep(): ?string
    {
        return $this->rep;
    }

    public function setRep(?string $rep): self
    {
        $this->rep = $rep;

        return $this;
    }

    public function getAdr(): ?string
    {
        return $this->adr;
    }

    public function setAdr(?string $adr): self
    {
        $this->adr = $adr;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumFix(): ?string
    {
        return $this->numFix;
    }

    public function setNumFix(?string $numFix): self
    {
        $this->numFix = $numFix;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getFactureGlobale(): ?FactureGlobale
    {
        return $this->factureGlobale;
    }

    public function setFactureGlobale(?FactureGlobale $factureGlobale): self
    {
        $this->factureGlobale = $factureGlobale;

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

    public function getBordereauReg(): ?BordereauReg
    {
        return $this->bordereauReg;
    }

    public function setBordereauReg(?BordereauReg $bordereauReg): self
    {
        $this->bordereauReg = $bordereauReg;

        return $this;
    }

    /**
     * @return Collection|CentreGestInt[]
     */
    public function getCentreGestInt(): Collection
    {
        return $this->centreGestInt;
    }

    public function addCentreGestInt(CentreGestInt $centreGestInt): self
    {
        if (!$this->centreGestInt->contains($centreGestInt)) {
            $this->centreGestInt[] = $centreGestInt;
            $centreGestInt->setAssociationVillagoise($this);
        }

        return $this;
    }

    public function removeCentreGestInt(CentreGestInt $centreGestInt): self
    {
        if ($this->centreGestInt->removeElement($centreGestInt)) {
            // set the owning side to null (unless already changed)
            if ($centreGestInt->getAssociationVillagoise() === $this) {
                $centreGestInt->setAssociationVillagoise(null);
            }
        }

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
}

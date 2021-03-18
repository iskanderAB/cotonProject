<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaisonRepository::class)
 */
class Saison
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
    private $compagne;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeb;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comm;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixCot;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tvaCot;

    /**
     * @ORM\ManyToOne(targetEntity=FactureGlobale::class, inversedBy="saisons")
     */
    private $factureGlobale;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, inversedBy="saisons")
     */
    private $Articles;

    /**
     * @ORM\ManyToOne(targetEntity=TicketPesee::class, inversedBy="saisons")
     */
    private $ticketPesee;

    /**
     * @ORM\ManyToOne(targetEntity=BordereauReg::class, inversedBy="saisons")
     */
    private $bordereauReg;

    public function __construct()
    {
        $this->Articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateDeb(): ?\DateTimeInterface
    {
        return $this->dateDeb;
    }

    public function setDateDeb(?\DateTimeInterface $dateDeb): self
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getComm(): ?string
    {
        return $this->comm;
    }

    public function setComm(?string $comm): self
    {
        $this->comm = $comm;

        return $this;
    }

    public function getPrixCot(): ?float
    {
        return $this->prixCot;
    }

    public function setPrixCot(?float $prixCot): self
    {
        $this->prixCot = $prixCot;

        return $this;
    }

    public function getTvaCot(): ?float
    {
        return $this->tvaCot;
    }

    public function setTvaCot(?float $tvaCot): self
    {
        $this->tvaCot = $tvaCot;

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

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->Articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->Articles->contains($article)) {
            $this->Articles[] = $article;
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->Articles->removeElement($article);

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

    public function getBordereauReg(): ?BordereauReg
    {
        return $this->bordereauReg;
    }

    public function setBordereauReg(?BordereauReg $bordereauReg): self
    {
        $this->bordereauReg = $bordereauReg;

        return $this;
    }
}

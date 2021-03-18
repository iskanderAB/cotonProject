<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $qteDispo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $uniteVente;

    /**
     * @ORM\ManyToMany(targetEntity=Saison::class, mappedBy="Articles")
     */
    private $saisons;

    /**
     * @ORM\ManyToMany(targetEntity=Besoin::class, inversedBy="articles")
     */
    private $besoins;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->besoins = new ArrayCollection();
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

    public function getQteDispo(): ?float
    {
        return $this->qteDispo;
    }

    public function setQteDispo(?float $qteDispo): self
    {
        $this->qteDispo = $qteDispo;

        return $this;
    }

    public function getUniteVente(): ?float
    {
        return $this->uniteVente;
    }

    public function setUniteVente(?float $uniteVente): self
    {
        $this->uniteVente = $uniteVente;

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
            $saison->addArticle($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        if ($this->saisons->removeElement($saison)) {
            $saison->removeArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection|Besoin[]
     */
    public function getBesoins(): Collection
    {
        return $this->besoins;
    }

    public function addBesoin(Besoin $besoin): self
    {
        if (!$this->besoins->contains($besoin)) {
            $this->besoins[] = $besoin;
        }

        return $this;
    }

    public function removeBesoin(Besoin $besoin): self
    {
        $this->besoins->removeElement($besoin);

        return $this;
    }
}

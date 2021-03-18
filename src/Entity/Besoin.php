<?php

namespace App\Entity;

use App\Repository\BesoinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BesoinRepository::class)
 */
class Besoin
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
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, mappedBy="besoins")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity=AssociationVillagoise::class, mappedBy="besoin")
     */
    private $associationVillagoise;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->associationVillagoise = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->addBesoin($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            $article->removeBesoin($this);
        }

        return $this;
    }

    /**
     * @return Collection|AssociationVillagoise[]
     */
    public function getAssociationVillagoise(): Collection
    {
        return $this->associationVillagoise;
    }

    public function addAssociationVillagoise(AssociationVillagoise $associationVillagoise): self
    {
        if (!$this->associationVillagoise->contains($associationVillagoise)) {
            $this->associationVillagoise[] = $associationVillagoise;
            $associationVillagoise->setBesoin($this);
        }

        return $this;
    }

    public function removeAssociationVillagoise(AssociationVillagoise $associationVillagoise): self
    {
        if ($this->associationVillagoise->removeElement($associationVillagoise)) {
            // set the owning side to null (unless already changed)
            if ($associationVillagoise->getBesoin() === $this) {
                $associationVillagoise->setBesoin(null);
            }
        }

        return $this;
    }
}

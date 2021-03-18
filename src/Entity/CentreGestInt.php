<?php

namespace App\Entity;

use App\Repository\CentreGestIntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CentreGestIntRepository::class)
 */
class CentreGestInt
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
     * @ORM\ManyToOne(targetEntity=AssociationVillagoise::class, inversedBy="centreGestInt")
     */
    private $associationVillagoise;

    /**
     * @ORM\OneToMany(targetEntity=Canton::class, mappedBy="centreGestInt")
     */
    private $canton;

    public function __construct()
    {
        $this->canton = new ArrayCollection();
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

    public function getAssociationVillagoise(): ?AssociationVillagoise
    {
        return $this->associationVillagoise;
    }

    public function setAssociationVillagoise(?AssociationVillagoise $associationVillagoise): self
    {
        $this->associationVillagoise = $associationVillagoise;

        return $this;
    }

    /**
     * @return Collection|Canton[]
     */
    public function getCanton(): Collection
    {
        return $this->canton;
    }

    public function addCanton(Canton $canton): self
    {
        if (!$this->canton->contains($canton)) {
            $this->canton[] = $canton;
            $canton->setCentreGestInt($this);
        }

        return $this;
    }

    public function removeCanton(Canton $canton): self
    {
        if ($this->canton->removeElement($canton)) {
            // set the owning side to null (unless already changed)
            if ($canton->getCentreGestInt() === $this) {
                $canton->setCentreGestInt(null);
            }
        }

        return $this;
    }
}

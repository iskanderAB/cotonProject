<?php

namespace App\Entity;

use App\Repository\CantonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CantonRepository::class)
 */
class Canton
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
     * @ORM\ManyToOne(targetEntity=CentreGestInt::class, inversedBy="canton")
     */
    private $centreGestInt;

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

    public function getCentreGestInt(): ?CentreGestInt
    {
        return $this->centreGestInt;
    }

    public function setCentreGestInt(?CentreGestInt $centreGestInt): self
    {
        $this->centreGestInt = $centreGestInt;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreEn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sTitreFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sTitreEn;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texteFr;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texteEn;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^[a-z][a-z0-9\-]*$/")
     */
    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreFr(): ?string
    {
        return $this->titreFr;
    }

    public function setTitreFr(string $titreFr): self
    {
        $this->titreFr = $titreFr;

        return $this;
    }

    public function getTitreEn(): ?string
    {
        return $this->titreEn;
    }

    public function setTitreEn(string $titreEn): self
    {
        $this->titreEn = $titreEn;

        return $this;
    }

    public function getSTitreFr(): ?string
    {
        return $this->sTitreFr;
    }

    public function setSTitreFr(string $sTitreFr): self
    {
        $this->sTitreFr = $sTitreFr;

        return $this;
    }

    public function getSTitreEn(): ?string
    {
        return $this->sTitreEn;
    }

    public function setSTitreEn(string $sTitreEn): self
    {
        $this->sTitreEn = $sTitreEn;

        return $this;
    }

    public function getTexteFr(): ?string
    {
        return $this->texteFr;
    }

    public function setTexteFr(string $texteFr): self
    {
        $this->texteFr = $texteFr;

        return $this;
    }

    public function getTexteEn(): ?string
    {
        return $this->texteEn;
    }

    public function setTexteEn(?string $texteEn): self
    {
        $this->texteEn = $texteEn;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }


}

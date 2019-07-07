<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @Vich\Uploadable
 */
class Post
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string|null
     */
    private $image;

    /**
       * @Vich\UploadableField(mapping="post_image", fileNameProperty="image")
       *
       * @var File|null
       */
      private $imageFile;

      /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="posts")
     */
    private $categories;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Regex(pattern="/^[a-z][a-z0-9\-]*$/")
     */
    private $slug;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

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

    public function setTexteFr(?string $texteFr): self
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

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

    public function __toString()
    	{
    		return $this->titreFr;
    	}
}

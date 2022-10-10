<?php

namespace App\Entity;


use App\Repository\RecettesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
// use Cocur\Slugify\Slugify;




/**
 * @ORM\Entity(repositoryClass=RecettesRepository::class)
 * @Vich\Uploadable()
 */
class Recettes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null 
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="recette_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=250)
     */
    private $titreRecette;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionRecette;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(min=0.50,max=10.00)
     */
    private $prixRecette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien_video;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_recette;

    /**
     * @var datetime|null
     * @ORM\Column(type="datetime")
     */
    private $updated_at;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreRecette(): ?string
    {
        return $this->titreRecette;
    }

    public function setTitreRecette(string $titreRecette): self
    {
        $this->titreRecette = $titreRecette;

        return $this;
    }

    // public function getSlug(): string
    // {
      //  return (new Slugify())->slugify($this->titreRecette);
    //}

    public function getDescriptionRecette(): ?string
    {
        return $this->descriptionRecette;
    }

    public function setDescriptionRecette(string $descriptionRecette): self
    {
        $this->descriptionRecette = $descriptionRecette;

        return $this;
    }

    public function getPrixRecette(): ?float
    {
        return $this->prixRecette;
    }

    public function setPrixRecette(float $prixRecette): self
    {
        $this->prixRecette = $prixRecette;

        return $this;
    }

    public function getLienVideo(): ?string
    {
        return $this->lien_video ;
    }

    public function setLienVideo(string $lien_video): self
    {
        $this->lien_video = $lien_video. "embed";

        return $this;
    }

    public function getImageRecette(): ?string
    {
        return $this->image_recette;
    }

    public function setImageRecette(string $image_recette): self
    {
        $this->image_recette = $image_recette;

        return $this;
    }

    /**
     * Get the value of filename
     *
     * @return  string|null
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @param  string|null  $filename
     *
     * @return  self
     */ 
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get the value of imageFile
     *
     * @return  File|null
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @param  File|null  $imageFile
     *
     * @return  self
     */ 
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}

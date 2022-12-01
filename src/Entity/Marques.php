<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=MarquesRepository::class)
 * @Vich\Uploadable()
 */
class Marques
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
    private $filenameMarque;
    /**
     * @var File|null
     * @Vich\UploadableField(mapping="image_marque", fileNameProperty="filenameMarque")
     */
    private $imageFileMarque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomMarque;

    /**
     * @ORM\Column(type="datetime")
     */
    private $marque_updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMarque(): ?string
    {
        return $this->nomMarque;
    }

    public function setNomMarque(string $nomMarque): self
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }
   
    /**
     * Get the value of filenameMarque
     *
     * @return  string|null
     */ 
    public function getFilenameMarque()
    {
        return $this->filenameMarque;
    }

    /**
     * Set the value of filenameMarque
     *
     * @param  string|null  $filenameMarque
     *
     * @return  self
     */ 
    public function setFilenameMarque($filenameMarque)
    {
        $this->filenameMarque = $filenameMarque;

        return $this;
    }

    /**
     * Get the value of imageFileMarque
     *
     * @return  File|null
     */ 
    public function getImageFileMarque()
    {
        return $this->imageFileMarque;
    }

    /**
     * Set the value of imageFileMarque
     *
     * @param  File|null  $imageFileMarque
     *
     * @return  self
     */ 
    public function setImageFileMarque($imageFileMarque)
    {
        $this->imageFileMarque = $imageFileMarque;
        if ($this->imageFileMarque instanceof UploadedFile) {
            $this->marque_updated_at = new \DateTime('now');
        }

        return $this;
    }

    public function getMarqueUpdatedAt(): ?\DateTimeInterface
    {
        return $this->marque_updated_at;
    }

    public function setMarqueUpdatedAt(\DateTimeInterface $marque_updated_at): self
    {
        $this->marque_updated_at = $marque_updated_at;

        return $this;
    }
}

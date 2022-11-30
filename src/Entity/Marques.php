<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=MarquesRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $nomMarque;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien_image_marque;

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
    public function getLienImageMarque(): ?string
    {
        return $this->lien_image_marque;
    }
    public function setLienImageMarque($LienImageMarque): self
    {
        $this->LienImageMarque = $LienImageMarque;

        return $this;
    }
}

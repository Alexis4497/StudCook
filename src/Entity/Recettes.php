<?php

namespace App\Entity;

use App\Repository\RecettesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecettesRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $titreRecette;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionRecette;

    /**
     * @ORM\Column(type="float")
     */
    private $prixRecette;

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
}

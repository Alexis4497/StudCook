<?php

namespace App\Entity;

use App\Repository\BonsPlansRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BonsPlansRepository::class)
 */
class BonsPlans
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
    private $nomBonPlan;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienBonPlan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien_image_bon_plan;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBonPlan(): ?string
    {
        return $this->nomBonPlan;
    }

    public function setNomBonPlan(string $nomBonPlan): self
    {
        $this->nomBonPlan = $nomBonPlan;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLienBonPlan(): ?string
    {
        return $this->lienBonPlan;
    }

    public function setLienBonPlan(string $lienBonPlan): self
    {
        $this->lienBonPlan = $lienBonPlan;

        return $this;
    }

    public function getLienImageBonPlan(): ?string
    {
        return $this->lien_image_bon_plan;
    }

    public function setLienImageBonPlan(string $lien_image_bon_plan): self
    {
        $this->lien_image_bon_plan = $lien_image_bon_plan;

        return $this;
    }
}

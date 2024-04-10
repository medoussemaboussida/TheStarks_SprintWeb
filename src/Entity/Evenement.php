<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ev", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEv;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ev", type="string", length=255, nullable=false)
     */
    private $nomEv;

    /**
     * @var string
     *
     * @ORM\Column(name="type_ev", type="string", length=255, nullable=false)
     */
    private $typeEv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="image_ev", type="string", length=255, nullable=false)
     */
    private $imageEv;

    /**
     * @var string
     *
     * @ORM\Column(name="description_ev", type="string", length=255, nullable=false)
     */
    private $descriptionEv;

    /**
     * @var int
     *
     * @ORM\Column(name="code_participant", type="integer", nullable=false)
     */
    private $codeParticipant;

    /**
     * @ORM\OneToMany(targetEntity="Dons", mappedBy="evenement")
     */
    private $dons;

    public function __construct()
    {
        $this->dons = new ArrayCollection();
    }


    /**
     * @ORM\Column(name="nb_points", type="integer", nullable=false)
     */
    private $nbPoints;


 

    public function getIdEv(): ?int
    {
        return $this->idEv;
    }

    public function getNomEv(): ?string
    {
        return $this->nomEv;
    }

    public function setNomEv(string $nomEv): static
    {
        $this->nomEv = $nomEv;

        return $this;
    }

    public function getTypeEv(): ?string
    {
        return $this->typeEv;
    }

    public function setTypeEv(string $typeEv): static
    {
        $this->typeEv = $typeEv;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getImageEv(): ?string
    {
        return $this->imageEv;
    }

    public function setImageEv(string $imageEv): static
    {
        $this->imageEv = $imageEv;

        return $this;
    }

    public function getDescriptionEv(): ?string
    {
        return $this->descriptionEv;
    }

    public function setDescriptionEv(string $descriptionEv): static
    {
        $this->descriptionEv = $descriptionEv;

        return $this;
    }

    public function getCodeParticipant(): ?int
    {
        return $this->codeParticipant;
    }

    public function setCodeParticipant(int $codeParticipant): static
    {
        $this->codeParticipant = $codeParticipant;

        return $this;
    }

    /**
     * @return Collection<int, Dons>
     */
    public function getDons(): Collection
    {
        return $this->dons;
    }

    public function addDon(Dons $don): static
    {
        if (!$this->dons->contains($don)) {
            $this->dons->add($don);
            $don->setEvenement($this);
        }

        return $this;
    }

    public function removeDon(Dons $don): static
    {
        if ($this->dons->removeElement($don)) {
            // set the owning side to null (unless already changed)
            if ($don->getEvenement() === $this) {
                $don->setEvenement(null);
            }
        }

        return $this;
    }

    public function getNbPoints(): ?int
    {
        return $this->nbPoints;
    }

    public function setNbPoints(int $nbPoints): static
    {
        $this->nbPoints = $nbPoints;

        return $this;
    }

}

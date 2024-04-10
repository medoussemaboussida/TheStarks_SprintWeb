<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Codepromo
 *
 * @ORM\Table(name="codepromo")
 * @ORM\Entity
 */
class Codepromo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCode", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcode;

    /**
     * @var int
     *
     * @ORM\Column(name="reductionAssocie", type="integer", nullable=false)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     */
    private $reductionassocie;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     */
    private $datefin;

    /**
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if ($this->datedebut >= $this->datefin) {
            $context->buildViolation('La date de début doit être avant la date de fin.')
                ->atPath('datedebut')
                ->addViolation();
        }
    }

    public function getIdcode(): ?int
    {
        return $this->idcode;
    }

    public function getReductionassocie(): ?int
    {
        return $this->reductionassocie;
    }

    public function setReductionassocie(int $reductionassocie): static
    {
        $this->reductionassocie = $reductionassocie;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): static
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): static
    {
        $this->datefin = $datefin;

        return $this;
    }


}

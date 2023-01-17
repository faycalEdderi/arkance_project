<?php

namespace App\Entity;

use App\Repository\GenderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenderRepository::class)]
class Gender
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $gender_value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenderValue(): ?string
    {
        return $this->gender_value;
    }

    public function setGenderValue(string $gender_value): self
    {
        $this->gender_value = $gender_value;

        return $this;
    }

    public function __toString()
    {
        return $this->gender_value;
    }
}

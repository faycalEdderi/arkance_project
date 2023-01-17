<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $gender = null;

    #[ORM\OneToOne(mappedBy: 'head_teatcher', cascade: ['persist', 'remove'])]
    private ?SchoolClass $head_schoolClass = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHeadSchoolClass(): ?SchoolClass
    {
        return $this->head_schoolClass;
    }

    public function setHeadSchoolClass(SchoolClass $head_schoolClass): self
    {
        // set the owning side of the relation if necessary
        if ($head_schoolClass->getHeadTeatcher() !== $this) {
            $head_schoolClass->setHeadTeatcher($this);
        }

        $this->head_schoolClass = $head_schoolClass;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Entity\Gender;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
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
    private ?string $gender;

    #[ORM\ManyToMany(targetEntity: Subject::class)]
    private Collection $subject;

    #[ORM\ManyToOne(inversedBy: 'class_students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SchoolClass $schoolClass = null;

    #[ORM\OneToMany(mappedBy: 'student_rating', targetEntity: Grade::class, orphanRemoval: true)]
    private Collection $grade;

    public function __construct()
    {
        $this->subject = new ArrayCollection();
        $this->grade = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Subject>
     */
    public function getSubject(): Collection
    {
        return $this->subject;
    }

    public function addSubject(Subject $subject): self
    {
        if (!$this->subject->contains($subject)) {
            $this->subject->add($subject);
        }

        return $this;
    }

    public function removeSubject(Subject $subject): self
    {
        $this->subject->removeElement($subject);

        return $this;
    }

    public function getSchoolClass(): ?SchoolClass
    {
        return $this->schoolClass;
    }

    public function setSchoolClass(?SchoolClass $schoolClass): self
    {
        $this->schoolClass = $schoolClass;

        return $this;
    }


    /**
     * @return Collection<int, Grade>
     */
    public function getGrade(): Collection
    {
        return $this->grade;
    }

    public function addGrade(Grade $grade): self
    {
        if (!$this->grade->contains($grade)) {
            $this->grade->add($grade);
            $grade->setStudentRating($this);
        }

        return $this;
    }

    public function removeGrade(Grade $grade): self
    {
        if ($this->grade->removeElement($grade)) {
            // set the owning side to null (unless already changed)
            if ($grade->getStudentRating() === $this) {
                $grade->setStudentRating(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->schoolClass . ' ' . $this->grade . ' ' . $this->subject;
    }
}

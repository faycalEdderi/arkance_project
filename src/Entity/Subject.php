<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $subject_name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teacher $subject_teacher = null;

    #[ORM\OneToMany(mappedBy: 'subject', targetEntity: Grade::class, orphanRemoval: true)]
    private Collection $grade;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $appreciation = null;

    #[ORM\ManyToOne(inversedBy: 'subject_appreciation')]
    private ?Student $student_appreciation = null;




    public function __construct()
    {
        $this->grade = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubjectName(): ?string
    {
        return $this->subject_name;
    }

    public function setSubjectName(string $subject_name): self
    {
        $this->subject_name = $subject_name;

        return $this;
    }

    public function getSubjectTeacher(): ?Teacher
    {
        return $this->subject_teacher;
    }

    public function setSubjectTeacher(Teacher $subject_teacher): self
    {
        $this->subject_teacher = $subject_teacher;

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
            $grade->setSubject($this);
        }

        return $this;
    }

    public function removeGrade(Grade $grade): self
    {
        if ($this->grade->removeElement($grade)) {
            // set the owning side to null (unless already changed)
            if ($grade->getSubject() === $this) {
                $grade->setSubject(null);
            }
        }

        return $this;
    }

    public function getAppreciation(): ?string
    {
        return $this->appreciation;
    }

    public function setAppreciation(?string $appreciation): self
    {
        $this->appreciation = $appreciation;

        return $this;
    }

    public function getStudentAppreciation(): ?Student
    {
        return $this->student_appreciation;
    }

    public function setStudentAppreciation(?Student $student_appreciation): self
    {
        $this->student_appreciation = $student_appreciation;

        return $this;
    }

    public function __toString()
    {
        return  $this->subject_name;
    }
}

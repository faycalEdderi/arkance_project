<?php

namespace App\Entity;

use App\Repository\SchoolClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchoolClassRepository::class)]
class SchoolClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;

    #[ORM\OneToOne(inversedBy: 'head_schoolClass', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teacher $first_teacher = null;

    #[ORM\OneToMany(mappedBy: 'schoolClass', targetEntity: Student::class, orphanRemoval: true)]
    private Collection $class_students;

    public function __construct()
    {
        $this->class_students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getHeadTeatcher(): ?Teacher
    {
        return $this->first_teacher;
    }

    public function setHeadTeatcher(Teacher $first_teacher): self
    {
        $this->first_teacher = $first_teacher;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getClassStudents(): Collection
    {
        return $this->class_students;
    }

    public function addClassStudent(Student $classStudent): self
    {
        if (!$this->class_students->contains($classStudent)) {
            $this->class_students->add($classStudent);
            $classStudent->setSchoolClass($this);
        }

        return $this;
    }

    public function removeClassStudent(Student $classStudent): self
    {
        if ($this->class_students->removeElement($classStudent)) {
            // set the owning side to null (unless already changed)
            if ($classStudent->getSchoolClass() === $this) {
                $classStudent->setSchoolClass(null);
            }
        }

        return $this;
    }
}

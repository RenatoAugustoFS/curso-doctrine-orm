<?php

namespace App\Entity\Course;

use App\Entity\Student\Student;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Course
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Student\Student", inversedBy="courses")
     */
    private Collection $students;

    public function __construct(string $description)
    {
        $this->description = $description;
        $this->students = new ArrayCollection();
    }

    public function id(): int
    {
        return $this->id;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function addStudent(Student $student): void
    {
        if ($this->students->contains($student)){return;}
        $this->students->add($student);
        $student->addCourse($this);
    }

    public function removeStudent(Student $student): void
    {
        if (!$this->students->contains($student)){return;}
        $this->students->removeElement($student);
    }

    public function students(): Collection
    {
        return $this->students;
    }
}
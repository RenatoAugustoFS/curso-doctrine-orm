<?php

namespace App\Entity\Student;

use App\Entity\Course\Course;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\Student\QueryBuilderStudentRepository")
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Student\Phone", mappedBy="student", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private Collection $phones;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Course\Course", mappedBy="students")
     */
    private Collection $courses;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function changeName(string $name): void
    {
        $this->name = $name;
    }

    public function addPhone(string $areaCode, string $number): void
    {
        $phone = new Phone($areaCode, $number);
        $this->phones->add($phone);
        $phone->addStudent($this);
    }

    public function phones(): Collection
    {
        return $this->phones;
    }

    public function addCourse(Course $course): void
    {
        if ($this->courses->contains($course)){return;}
        $this->courses->add($course);
        $course->addStudent($this);
    }

    public function removeCourse(Course $course): void
    {
        if (!$this->courses->contains($course)){return;}
        $this->courses->removeElement($course);
        $course->removeStudent($this);
    }

    public function courses(): Collection
    {
        return $this->courses;
    }
}
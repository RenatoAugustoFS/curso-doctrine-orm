<?php

namespace App\Infrastructure\Repository\Student;

use App\Entity\Student\Student;
use App\Entity\Student\StudentRepository;
use Doctrine\ORM\EntityRepository;

class DqlStudentRepository extends EntityRepository implements StudentRepository
{
    public function studentsWithCourse(): array
    {
        $studentClass = Student::class;
        $query = $this->_em->createQuery(
            "SELECT student, phones, courses FROM $studentClass student 
            JOIN student.phones phones 
            LEFT JOIN student.courses courses"
        );
        return $query->getResult();
    }

    public function totalStudents(): int
    {
        $studentClass = Student::class;
        $query = $this->_em->createQuery("SELECT COUNT(student) FROM $studentClass student");
        return $query->getSingleScalarResult();
    }
}
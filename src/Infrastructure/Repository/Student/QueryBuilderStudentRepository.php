<?php

namespace App\Infrastructure\Repository\Student;

use App\Entity\Student\StudentRepository;
use Doctrine\ORM\EntityRepository;

class QueryBuilderStudentRepository extends EntityRepository implements StudentRepository
{
    public function studentsWithCourse(): array
    {
        $query = $this->createQueryBuilder('student')
            ->join('student.phones', 'phones')
            ->join('student.courses', 'courses')
            ->addSelect('phones')
            ->addSelect('courses')
            ->getQuery();

        return $query->getResult();
    }

    public function totalStudents(): int
    {
        $query = $this->createQueryBuilder('student')
            ->select('count(student.id)')
            ->getQuery();

        return $query->getSingleScalarResult();
    }
}
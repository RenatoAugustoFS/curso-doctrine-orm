<?php

namespace App\Entity\Student;

interface StudentRepository
{
    public function studentsWithCourse(): array;

    public function totalStudents(): int;
}
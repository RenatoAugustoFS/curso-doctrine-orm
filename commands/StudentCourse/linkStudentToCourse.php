<?php

use App\Entity\Course\Course;
use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$studentId = $argv[1];
$courseId = $argv[2];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);
$student = $studentRepository->find($studentId);

$courseRepository = $entityManager->getRepository(Course::class);
$course = $courseRepository->find($courseId);
$course->addStudent($student);

$entityManager->flush();
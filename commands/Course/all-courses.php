<?php

use App\Entity\Course\Course;
use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$courseRepository = $entityManager->getRepository(Course::class);
$courses = $courseRepository->findAll();
foreach ($courses as $course){
    $students = $course->students()->map(function (Student $student){
        return $student->name();
    })->toArray();

    echo $course->id() . "\n";
    echo $course->description() . "\n";
    echo implode(', ', $students) . "\n\n";
}

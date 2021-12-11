<?php

require_once "vendor/autoload.php";

use App\Entity\Course\Course;
use App\Entity\Student\Phone;
use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);
$students = $studentRepository->findAll();

/** @var Student $student */
foreach ($students as $student) {
    $phoneList = $student->phones()->map(function (Phone $phone){
        return $phone->formattedPhone();
    })->toArray();

    echo "Name: " . $student->name() . "\n";
    echo "Phone: ". implode(', ', $phoneList) . "\n";

    $courseList = $student->courses();

    /** @var Course $course */
    foreach ($courseList as $course){
        echo "Course Id: " . $course->id() . "\n";
        echo "Description: " . $course->description() . "\n";
    }
    echo "\n\n";
}


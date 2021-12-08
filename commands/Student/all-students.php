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

foreach ($students as $student){
    $phones = $student->phones()->map(function (Phone $phone){
        return $phone->formattedPhone();
    })->toArray();

    $courses = $student->courses()->map(function (Course $course){
        return $course->description();
    })->toArray();

    echo "Id: " . $student->id() . "\n";
    echo "Name: " . $student->name() . "\n";
    echo "Phones: " . implode(', ',$phones) . "\n";
    echo "Courses: " . implode(', ',$courses) . "\n\n";
}
<?php

require_once "vendor/autoload.php";

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

    echo "Id: " . $student->id() . "\n";
    echo "Name: " . $student->name() . "\n";
    echo "Phones: " . implode(', ',$phones) . "\n\n";
}
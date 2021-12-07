<?php

require_once "vendor/autoload.php";

use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);
$students = $studentRepository->findAll();

foreach ($students as $student){
    echo $student->id() . "\n";
    echo $student->name() . "\n\n";
}
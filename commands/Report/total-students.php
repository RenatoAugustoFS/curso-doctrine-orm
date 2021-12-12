<?php

use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);
echo $studentRepository->totalStudents();
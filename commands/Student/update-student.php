<?php

require_once "vendor/autoload.php";

use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

$id = $argv[1];
$newName = $argv[2];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);
$student = $studentRepository->find($id);
$student->changeName($newName);

$entityManager->flush();
<?php

use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$id = $argv[1];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);
$student = $studentRepository->find($id);

$entityManager->remove($student);
$entityManager->flush();
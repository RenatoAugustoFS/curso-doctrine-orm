<?php

use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$name = $argv[1];
$student = new Student($name);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$entityManager->persist($student);
$entityManager->flush();

<?php

use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$name = $argv[1];
$areaCode = $argv[2];
$number = $argv[3];
$areaCode2 = $argv[4];
$number2 = $argv[5];

$student = new Student($name);
$student->addPhone($areaCode, $number);
$student->addPhone($areaCode2, $number2);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$entityManager->persist($student);
$entityManager->flush();

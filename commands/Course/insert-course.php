<?php

use App\Entity\Course\Course;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$description = $argv[1];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$course = new Course($description);

$entityManager->persist($course);
$entityManager->flush();

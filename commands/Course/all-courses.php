<?php

use App\Entity\Course\Course;
use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$courseRepository = $entityManager->getRepository(Course::class);
$courses = $courseRepository->findAll();
foreach ($courses as $course){
    echo $course->id() . "\n";
    echo $course->description() . "\n\n";
}

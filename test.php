<?php

use App\Infrastructure\Doctrine\EntityManagerFactory;

require_once "vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

var_dump($entityManager->getConnection());

<?php

require_once "vendor/autoload.php";

// cli-config.php
use App\Infrastructure\Doctrine\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;


$entityManager = new EntityManagerFactory();
return ConsoleRunner::createHelperSet($entityManager->getEntityManager());

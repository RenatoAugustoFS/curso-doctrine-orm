<?php

require_once "vendor/autoload.php";

use App\Entity\Course\Course;
use App\Entity\Student\Phone;
use App\Entity\Student\Student;
use App\Infrastructure\Doctrine\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$studentRepository = $entityManager->getRepository(Student::class);
$students = $studentRepository->studentsWithCourse();

/** @var Student $student */
foreach ($students as $student) {
    echo "ID: " . $student->id() . "\n";
    echo "Name: " . $student->name() . "\n";

    $phoneList = $student->phones()->map(function (Phone $phone){
        return $phone->formattedPhone();
    })->toArray();
    echo "Phone: ". implode(', ', $phoneList) . "\n";

    $courseList = $student->courses();

    $courses = $student->courses()->map(function (Course $course){
        return $course->description();
    })->toArray();

    echo "Courses: " . implode(', ',$courses) . "\n\n";
}

foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'] . "\n";
    echo "\n";
}

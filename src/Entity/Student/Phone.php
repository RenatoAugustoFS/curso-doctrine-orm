<?php

namespace App\Entity\Student;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Phone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $areaCode;

    /**
     * @ORM\Column(type="string")
     */
    private string $number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Student\Student", inversedBy="phones")
     */
    private Student $student;

    public function __construct(string $areaCode, string $number)
    {
        $this->validatePhone($areaCode, $number);
        $this->areaCode = $areaCode;
        $this->number = $number;
    }

    private function validatePhone(string $areaCode, string $number): void
    {
        if (strlen($areaCode) != 3 || strlen($number) != 9){
            throw new \InvalidArgumentException("invalid area code or number");
        }
    }

    public function addStudent(Student $student): void
    {
        $this->student = $student;
    }

    public function formattedPhone(): string
    {
        return "({$this->areaCode}) {$this->number}";
    }
}
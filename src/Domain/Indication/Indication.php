<?php


namespace Alura\Arquitetura\Domain\Indication;


use Alura\Arquitetura\Domain\Student\Student;

class Indication
{
    private $indicator;
    private $indicated;
    private $date;

    public function __construct(Student $indicator, Student $indicated)
    {
        $this->indicator = $indicator;
        $this->indicated = $indicated;
        $this->date      = new \DateTimeImmutable();
    }
}

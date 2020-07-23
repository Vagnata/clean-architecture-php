<?php

namespace Alura\Arquitetura\Domain\Student;

use Alura\Arquitetura\Domain\Cpf;

class Student
{
    private $name;
    private $email;
    private $cpf;
    private $phones = [];


    public function __construct($name, $email, $cpf)
    {
        $this->name   = $name;
        $this->email  = $email;
        $this->cpf    = $cpf;
    }

    public static function withCpfNameAndEmail(string $cpf, string $name, string $email): self
    {
        return new Student($name, $email, new Cpf($cpf));
    }


    public function addPhoneNumber(string $areaCode, string $number): self
    {
        $this->phones[] = new Phone($areaCode, $number);

        return $this;
    }

    public function getPhones(): array
    {
        return $this->phones;
    }
}
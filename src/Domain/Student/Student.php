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

    /**
     * @return Phone[]
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
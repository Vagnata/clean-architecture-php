<?php


namespace Alura\Arquitetura;


class Student
{
    private $name;
    private $email;
    private $cpf;
    private $phones = [];

    public function addPhoneNumber(string $areaCode, string $number)
    {
        $this->phones[] = new Phone($areaCode, $number);
    }

    public function getPhones(): array
    {
        return $this->phones;
    }
}
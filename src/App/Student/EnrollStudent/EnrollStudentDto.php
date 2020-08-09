<?php

namespace Alura\Arquitetura\App\Student\EnrollStudent;

class EnrollStudentDto
{
    public $cpf;
    public $name;
    public $email;

    public function __construct($cpf, $name, $email)
    {
        $this->cpf   = $cpf;
        $this->name  = $name;
        $this->email = $email;
    }
}

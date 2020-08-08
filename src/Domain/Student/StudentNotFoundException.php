<?php

namespace Alura\Arquitetura\Domain\Student;

use Alura\Arquitetura\Domain\Cpf;

class StudentNotFoundException extends \DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Aluno com $cpf não encontrado");
    }
}

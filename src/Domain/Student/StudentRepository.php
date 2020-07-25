<?php


namespace Alura\Arquitetura\Domain\Student;


use Alura\Arquitetura\Domain\Cpf;

interface StudentRepository
{
    public function save(Student $student): void;
    public function findByCpf(Cpf $cpf): Student;
}
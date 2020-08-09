<?php

namespace Alura\Arquitetura\Infra\Student;

use Alura\Arquitetura\Domain\Cpf;
use Alura\Arquitetura\Domain\Student\Student;
use Alura\Arquitetura\Domain\Student\StudentNotFoundException;
use Alura\Arquitetura\Domain\Student\StudentRepository;
use PDO;

class StudentRepositoryMemory implements StudentRepository
{
    private $students = [];

    public function save(Student $student): void
    {
        $this->students[] = $student;
    }

    public function findByCpf(Cpf $cpf): Student
    {
       $filteredStudent = array_filter($this->students, function (Student $student) use ($cpf) {
            return $student->getCpf() == $cpf;
       });

       if (!count($filteredStudent)) {
           throw new StudentNotFoundException($cpf);
       }

       return current($filteredStudent);
    }

    public function findAll(): array
    {
        return $this->students;
    }

}

<?php

namespace Alura\Arquitetura\App\Student\EnrollStudent;

use Alura\Arquitetura\Domain\Student\Student;
use Alura\Arquitetura\Domain\Student\StudentRepository;

class EnrollStudent
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(EnrollStudentDto $studentDto): void
    {
        $student = Student::withCpfNameAndEmail($studentDto->cpf, $studentDto->name, $studentDto->email);
        $this->repository->save($student);
    }
}

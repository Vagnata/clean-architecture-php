<?php

namespace Alura\Arquitetura\Testes\App\Student;

use Alura\Arquitetura\App\Student\EnrollStudent\EnrollStudent;
use Alura\Arquitetura\App\Student\EnrollStudent\EnrollStudentDto;
use Alura\Arquitetura\Domain\Cpf;
use Alura\Arquitetura\Infra\Student\StudentRepositoryMemory;
use Alura\Arquitetura\Testes\BaseTestCase;

class EnrollStudentTest extends BaseTestCase
{
    public function testShouldAddOneStudentToRepository()
    {
        $cpf           = $this->faker->cpf;
        $name          = $this->faker->name;
        $email         = $this->faker->email;
        $enrollStudent = new EnrollStudentDto($cpf, $name, $email);
        $repository    = new StudentRepositoryMemory();
        $useCase       = new EnrollStudent($repository);

        $useCase->execute($enrollStudent);

        $student = $repository->findByCpf(new Cpf($cpf));
        $this->assertSame($cpf, $student->getCpf());
        $this->assertSame($name, $student->getName());
        $this->assertSame($email, $student->getEmail());
        $this->assertEmpty($student->getPhones());

    }
}

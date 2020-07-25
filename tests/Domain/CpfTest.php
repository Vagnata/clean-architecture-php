<?php

namespace Alura\Arquitetura\Testes\Domain;

use Alura\Arquitetura\Domain\Cpf;
use Alura\Arquitetura\Testes\BaseTestCase;

class CpfTest extends BaseTestCase
{
    public function testValidCpfConstruction()
    {
        $number = $this->faker->numerify('###.###.###-##');
        $cpf    = new Cpf($number);

        $this->assertEquals($number, $cpf->__toString());
    }

    public function testThrowInvalidArgumentExceptionOnCpfConstruction()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid CPF number');

        new Cpf($this->faker->name);
    }
}

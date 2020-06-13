<?php

namespace Alura\Arquitetura\Testes;

use Alura\Arquitetura\Cpf;

class CpfTest extends BaseTestCase
{
    public function testValidCpfConstruction()
    {
        $cpf = new Cpf('000.000.000-00');

        $this->assertEquals('000.000.000-00', $cpf->__toString());
    }

    public function testThrowInvalidArgumentExceptionOnCpfConstruction()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid CPF number');

        new Cpf($this->faker->name);
    }
}

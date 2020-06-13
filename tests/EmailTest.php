<?php


namespace Alura\Arquitetura\Testes;

use Alura\Arquitetura\Email;

class EmailTest extends BaseTestCase
{
    public function testValidEmailConstruction()
    {
        $address = $this->faker->email;
        $email   = new Email($address);

        $this->assertEquals($address, $email->__toString());
    }

    public function testThrowInvalidArgumentExceptionOnCpfConstruction()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email address');

        new Email($this->faker->randomDigit);
    }
}
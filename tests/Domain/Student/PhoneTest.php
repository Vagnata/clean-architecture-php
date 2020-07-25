<?php

namespace Alura\Arquitetura\Testes\Domain\Student;


use Alura\Arquitetura\Domain\Student\Phone;
use Alura\Arquitetura\Testes\BaseTestCase;

class PhoneTest extends BaseTestCase
{
    public function testValidPhoneConstructionWith8NumberCharacters()
    {
        $areaCode = $this->faker->numerify('##');
        $number   = $this->faker->numerify('########');

        $phone = new Phone($areaCode, $number);

        $this->assertEquals($areaCode . $number, $phone );
    }

    public function testValidPhoneConstructionWith9NumberCharacters()
    {
        $areaCode = $this->faker->numerify('##');
        $number   = $this->faker->numerify('#########');

        $phone = new Phone($areaCode, $number);

        $this->assertEquals($areaCode . $number, $phone );
    }

    public function testThrowInvalidArgumentExceptionOnPhoneConstructionToInvalidAreaCode()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid area code');

        new Phone($this->faker->numerify('#####'), $this->faker->numerify('#########'));
    }

    public function testThrowInvalidArgumentExceptionOnPhoneConstructionToInvalidNumber()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid phone number');

        new Phone($this->faker->numerify('##'), $this->faker->numerify('#####'));
    }
}

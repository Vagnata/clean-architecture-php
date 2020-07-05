<?php

namespace Alura\Arquitetura\Testes;

use Alura\Arquitetura\Student;

class StudentTest extends BaseTestCase
{
    public function testPhoneNumberAddition()
    {
        $areaCode    = $this->faker->areaCode();
        $phoneNumber = $this->faker->cellphone(false);

        $student = new Student();
        $student->addPhoneNumber($areaCode, $phoneNumber);

        $this->assertEquals($areaCode . $phoneNumber, current($student->getPhones()));
    }
}

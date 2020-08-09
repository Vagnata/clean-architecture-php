<?php

namespace Alura\Arquitetura\Testes\Infra\Student;

use Alura\Arquitetura\Infra\Student\PasswordEncryptorMd5;
use Alura\Arquitetura\Testes\BaseTestCase;

class PasswordEncryptorMd5Test extends BaseTestCase
{
    /**
     * @var PasswordEncryptorMd5
     */
    private $passwordEncryptor;

    protected function setUp(): void
    {
        $this->passwordEncryptor = new PasswordEncryptorMd5();
        parent::setUp();
    }

    public function testShouldEncrypt()
    {
        $password = $this->faker->password;
        $encryptedPassword = md5($password);

        $fixture = $this->passwordEncryptor->encrypt($password);

        $this->assertEquals($encryptedPassword, $fixture);
    }

    public function testShouldValidateOnePassword()
    {
        $password = $this->faker->password;
        $encryptedPassword = md5($password);

        $validation = $this->passwordEncryptor->verify($password, $encryptedPassword);

        $this->assertTrue($validation);
    }

    public function testShouldNotValidateOnePassword()
    {
        $password = $this->faker->password;
        $encryptedPassword = md5($password . $this->faker->randomDigit);

        $validation = $this->passwordEncryptor->verify($password, $encryptedPassword);

        $this->assertFalse($validation);
    }
}

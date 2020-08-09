<?php

namespace Alura\Arquitetura\Infra\Student;

use Alura\Arquitetura\Domain\Student\PasswordEncryptor;

class PasswordEncryptorMd5 implements PasswordEncryptor
{
    public function encrypt(string $password): string
    {
        return md5($password);
    }

    public function verify(string $plainTextPassword, string $encryptedPassword): bool
    {
        return md5($plainTextPassword) === $encryptedPassword;
    }

}

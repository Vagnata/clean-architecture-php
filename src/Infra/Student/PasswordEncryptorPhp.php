<?php

namespace Alura\Arquitetura\Infra\Student;

use Alura\Arquitetura\Domain\Student\PasswordEncryptor;

class PasswordEncryptorPhp implements PasswordEncryptor
{
    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }

    public function verify(string $plainTextPassword, string $encryptedPassword): bool
    {
        return password_verify($plainTextPassword, $encryptedPassword);
    }
}

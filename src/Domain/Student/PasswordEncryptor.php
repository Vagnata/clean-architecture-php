<?php


namespace Alura\Arquitetura\Domain\Student;


interface PasswordEncryptor
{
    public function encrypt(string $password): string;
    public function verify(string $plainTextPassword, string $encryptedPassword): bool;
}
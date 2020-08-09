<?php

namespace Alura\Arquitetura\App\Indication;


use Alura\Arquitetura\Domain\Student\Student;

interface SendIndicationEmail
{
    public function sendTo(Student $indicatedStudent): void;
}
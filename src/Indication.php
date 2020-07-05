<?php


namespace Alura\Arquitetura;


class Indication
{
    private $indicator;
    private $indicated;

    public function __construct(Student $indicator, Student $indicated)
    {
        $this->indicator = $indicator;
        $this->indicated = $indicated;
    }
}

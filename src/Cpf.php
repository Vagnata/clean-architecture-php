<?php


namespace Alura\Arquitetura;


class Cpf
{
    private $number;

    public function __construct(string $number)
    {
        $this->setNumber($number);
    }

    public function __toString(): string
    {
        return $this->number;
    }

    private function setNumber(string $numero): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}.\d{3}.\d{3}-\d{2}/'
            ]
        ];

        if (filter_var($numero, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('Invalid CPF number');
        }

        $this->number = $numero;
    }
}
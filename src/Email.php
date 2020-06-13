<?php


namespace Alura\Arquitetura;


use http\Exception\InvalidArgumentException;

class Email
{
    private $address;

    public function __construct(string $address)
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException('Invalid email address');
        }

        $this->address = $address;
    }

    public function __toString()
    {
        return $this->address;
    }
}
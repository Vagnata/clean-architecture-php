<?php

namespace Alura\Arquitetura;

class Phone
{
    private $areaCode;
    private $number;

    public function __construct(string $areaCode, string $number)
    {
        $this->setAreaCode($areaCode);
        $this->setNumber($number);
    }

    private function setAreaCode(string $areaCode): void
    {
        $options = [
            'options' => [
                'regexp' => '/^.{2}$/'
            ]
        ];

        if (filter_var($areaCode, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('Invalid area code');
        }

        $this->areaCode = $areaCode;
    }

    private function setNumber(string $number): void
    {
        $options = [
            'options' => [
                'regexp' => '/^\d{8}(?:\d{1})?$/'
            ]
        ];

        if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('Invalid phone number');
        }

        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->areaCode . $this->number;
    }
}

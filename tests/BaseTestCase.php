<?php


namespace Alura\Arquitetura\Testes;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    /**
     * @var Generator
     */
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }
}

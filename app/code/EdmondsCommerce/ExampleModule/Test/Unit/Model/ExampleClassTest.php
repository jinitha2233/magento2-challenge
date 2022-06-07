<?php

declare(strict_types=1);

namespace EdmondsCommerce\ExampleModule\Test\Unit\Model;

use EdmondsCommerce\ExampleModule\Model\ExampleClass;
use PHPUnit\Framework\TestCase;

class ExampleClassTest extends TestCase
{
    private $testClass;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testClass = new ExampleClass();
    }

    /**
     * @test
     * @dataProvider getNumbersToAdd
     */
    public function itCanAddNumbersCorrectly(float $left, float $right, float $expected): void
    {
        $actual = $this->testClass->add($left, $right);
        self::assertSame($expected, $actual);
    }

    public function getNumbersToAdd(): array
    {
        return [
            'Simple adding' => [1.0, 2.0, 3.0],
            'Handle decimals' => [1.5, 2.3, 3.8]
        ];
    }
}

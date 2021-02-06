<?php

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAdd()
    {
        $expected = 5;
        $this->assertEquals($expected, $this->calculator->add(3, 2));
    }

    public function testDivide()
    {
        $expected = 5;
        $this->assertEquals($expected, $this->calculator->divide(10, 2));
    }

    public function testMultiply()
    {
        $expected = 6;
        $this->assertEquals($expected, $this->calculator->multiply(3, 2));
    }

    public function testSubtract()
    {
        $expected = 5;
        $this->assertEquals($expected, $this->calculator->subtract(7, 2));
    }
}

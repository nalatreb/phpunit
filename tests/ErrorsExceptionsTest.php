<?php

use App\BMICalculator;
use App\Exceptions\WrongBmiDataException;
use PHPUnit\Framework\TestCase;

class ErrorsExceptionsTest extends TestCase
{
    public function testErrorCanBeExpected(): void
    {
//        $this->expectError();
        $this->expectErrorMessage('foo');
//        fopen('test.txt', 'r');
        throw new Exception('foo');
    }

    public function testException()
    {
        $this->expectException(WrongBmiDataException::class);
        $bmiCalculator = new BMICalculator();
        $bmiCalculator->mass = 0;
        $bmiCalculator->height = 1.6;
        $bmiCalculator->calculate();
    }
}

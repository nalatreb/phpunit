<?php

use PHPUnit\Framework\TestCase;
use App\BMICalculator;

/**
 * @coversDefaultClass \App\BMICalculator
 */
class BMICalculatorTest extends TestCase
{
    private BMICalculator $bmiCalculator;

    public function setUp(): void
    {
        $this->bmiCalculator = new BMICalculator();
    }

    /**
     * @covers ::getTextResultFromBmi
     */
    public function testShowUnderweightWhenBmiLessThan18(): void
    {
        $this->bmiCalculator->bmi = 10;

        $result = $this->bmiCalculator->getTextResultFromBmi();

        $expected = 'Underweight';

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers ::getTextResultFromBmi
     */
    public function testShowNormalWhenBmiBetween1825(): void
    {
        $this->bmiCalculator->bmi = 24;

        $result = $this->bmiCalculator->getTextResultFromBmi();

        $expected = 'Normal';

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers ::getTextResultFromBmi
     */
    public function testShowOverweightWhenBmiMoreThan25(): void
    {
        $this->bmiCalculator->bmi = 38;

        $result = $this->bmiCalculator->getTextResultFromBmi();

        $expected = 'Overweight';

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers ::calculate
     */
    public function testCanCalculateCorrectBmi()
    {
        $expected = 39.1;
        $this->bmiCalculator->mass = 100;
        $this->bmiCalculator->height = 1.6;
        $result = $this->bmiCalculator->calculate();
        $this->assertEquals($expected, $result);
    }
}
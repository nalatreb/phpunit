<?php

namespace App;

use App\Exceptions\WrongBmiDataException;

class BMICalculator
{
    public float $bmi;
    public float $mass;
    public float $height;

    public function calculate(): float
    {
        if ($this->mass <= 0 || $this->height <= 0) {
            throw new WrongBmiDataException();
        }
        return round($this->mass / pow($this->height, 2), 1);
    }

    public function getTextResultFromBmi(): string
    {
        if ($this->bmi < 18) {
            return 'Underweight';
        }

        if ($this->bmi >= 18 && $this->bmi <= 25) {
            return 'Normal';
        }

        return 'Overweight';
    }
}
<?php

namespace App;

use InvalidArgumentException;

class Calculator
{
    public function add(float $a, float $b): float
    {
        return $a + $b; 
    }

    public function subtract(float $a, float $b): float
    {
        return $a - $b; 
    }

    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    public function divide(float $a, float $b): float
    {
        if ($b == 0) {
            throw new InvalidArgumentException('Division by zero is not allowed.');
        }

        return $a / $b;
    }

    public function power(float $base, int $exponent): float
    {
        return $base ** $exponent;
    }

    public function percentage(float $total, float $percentage): float
    {
        return ($total * $percentage) / 100;
    }

    public function average(array $numbers): float
    {
        if ($numbers === []) {
            throw new InvalidArgumentException('Cannot calculate average of an empty array.');
        }

        return array_sum($numbers) / count($numbers);
    }

    public function highest(array $numbers): float
    {
        if ($numbers === []) {
            throw new InvalidArgumentException('Cannot determine highest value of an empty array.');
        }

        return max($numbers);
    }

    public function lowest(array $numbers): float
    {
        if ($numbers === []) {
            throw new InvalidArgumentException('Cannot determine lowest value of an empty array.');
        }

        return min($numbers);
    }
}

<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;
use InvalidArgumentException;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        // Deze methode wordt vóór elke test uitgevoerd.
        // Hier maken we één keer een nieuwe Calculator aan
        // zodat elke test met een "schone" situatie begint.
        $this->calculator = new Calculator();
    }

    /* =========================
     * BASIC OPERATIONS
     * ========================= */

    public function testAdd()
    {
        // Arrange
        $a = 5;
        $b = 2;

        // Act
        $result = $this->calculator->add($a, $b);

        // Assert
        $this->assertEquals(8, $result);
    }

    /*
     * OPDRACHT:
     * Maak hieronder een test voor:
     * - optellen met negatieve getallen
     *
     * Denk aan:
     * - Arrange
     * - Act
     * - Assert
     */
    public function testAddWithNegativeNumbers()
    {
        $a = -5;
        $b = -3;

        $result = $this->calculator->add($a, $b);
        $this->assertEquals(-8, $result);
    }
    
    /*
    * OPDRACHT:
    * Maak een test voor subtract().
    * Test een normale situatie (bijvoorbeeld 10 - 4).
    */
    public function testSubtract()
    {
        $a = 10;
        $b = 4; 

        $result = $this->calculator->subtract($a, $b);  
        $this->assertEquals(6, $result);
    }

    /*
     * OPDRACHT:
     * Maak een test voor multiply().
     * Test:
     * - een normale vermenigvuldiging
     * - vermenigvuldigen met 0
     */
    public function testMultiply()
    {
        $a = 5;
        $b = 4;

        $result = $this->calculator->multiply($a, $b);
        $this->assertEquals(20, $result);

        // Test vermenigvuldigen met 0
        $resultZero = $this->calculator->multiply($a, 0);
        $this->assertEquals(0, $resultZero);
    }

    /*
     * OPDRACHT:
     * Maak een test voor divide().
     * Test:
     * - een normale deling
     * - delen door 0 moet een InvalidArgumentException geven
     *
     * Tip voor exception test:
     * $this->expectException(InvalidArgumentException::class);
     */
    public function testDivide()
    {
        $a = 10;
        $b = 2;

        $result = $this->calculator->divide($a, $b);
        $this->assertEquals(5, $result);

        // Test delen door 0
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->divide($a, 0);
    }

    /* =========================
     * POWER
     * ========================= */

    /*
     * OPDRACHT:
     * Maak een test voor power().
     * Test:
     * - 2 tot de macht 3
     * - exponent 0 (uitkomst moet 1 zijn)
     */
    public function testPower()
    {
        $base = 2;
        $exponent = 3;

        $result = $this->calculator->power($base, $exponent);
        $this->assertEquals(8, $result);

        // Test exponent 0
        $resultZeroExponent = $this->calculator->power($base, 0);
        $this->assertEquals(1, $resultZeroExponent);
    }

    /* =========================
     * PERCENTAGE
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor percentage().
     * Test:
     * - 10% van 200
     * - 0%
     * - een percentage boven de 100%
     */
    public function testPercentage()
    {
        $value = 200;
        $percentage = 10;

        $result = $this->calculator->percentage($value, $percentage);
        $this->assertEquals(20, $result);

        // Test 0%
        $resultZeroPercent = $this->calculator->percentage($value, 0);
        $this->assertEquals(0, $resultZeroPercent);

        // Test percentage boven de 100%
        $resultOverHundred = $this->calculator->percentage($value, 150);
        $this->assertEquals(300, $resultOverHundred);
    }

    /* =========================
     * AVERAGE
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor average().
     * Test:
     * - gemiddelde van 2 getallen
     * - gemiddelde van meerdere getallen
     * - lege array moet een exception geven
     */
    public function testAverage()
    {
        // Test gemiddelde van 2 getallen
        $numbers = [10, 20];
        $result = $this->calculator->average($numbers);
        $this->assertEquals(15, $result);

        // Test gemiddelde van meerdere getallen
        $numbersMultiple = [10, 20, 30];
        $resultMultiple = $this->calculator->average($numbersMultiple);
        $this->assertEquals(20, $resultMultiple);

        // Test lege array
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->average([]);
    }

    /* =========================
     * HIGHEST
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor highest().
     * Test:
     * - normale getallen
     * - negatieve getallen
     */
    public function testHighest()
    {
        // Test normale getallen
        $numbers = [10, 20, 5];
        $result = $this->calculator->highest($numbers);
        $this->assertEquals(20, $result);

        // Test negatieve getallen
        $negativeNumbers = [-10, -20, -5];
        $resultNegative = $this->calculator->highest($negativeNumbers);
        $this->assertEquals(-5, $resultNegative);
    }

    /* =========================
     * LOWEST
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor lowest().
     * Test:
     * - normale getallen
     * - decimalen
     */
    public function testLowest()
    {
        // Test normale getallen
        $numbers = [10, 20, 5];
        $result = $this->calculator->lowest($numbers);
        $this->assertEquals(5, $result);

        // Test decimalen
        $decimalNumbers = [1.5, 2.5, 0.5];
        $resultDecimal = $this->calculator->lowest($decimalNumbers);
        $this->assertEquals(0.5, $resultDecimal);
    }
}

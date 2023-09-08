<?php

namespace App\Tests;

use App\Entity\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAddition(): void
    {
        $calculator = new Calculator(2.2,3,"+");
        $result = $calculator->addition(2.2,3);

        $this->assertEquals(5.2, $result);
    }
    public function testSubtraction(): void
    {
        $calculator = new Calculator(2,3,"-");
        $result = $calculator->subtraction(2,3);

        $this->assertEquals(-1, $result);
    }
    public function testMultiplication(): void
    {
        $calculator = new Calculator(2,3,"*");
        $result = $calculator->multiplication(2,3);

        $this->assertEquals(6, $result);
    }
    public function testDivision(): void
    {
        $calculator = new Calculator(9,3,"/");
        $result = $calculator->division(9,3);

        $this->assertEquals(3, $result);
    }
}

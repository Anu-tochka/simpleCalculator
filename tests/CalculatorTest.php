<?php

namespace App\Tests;

use App\Entity\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAddition(): void
    {
        $calcA = new Calculator(2.2,3,"+");
        $resultA = $calcA->addition();

        $this->assertEquals(5.2, $resultA);
    }
    public function testSubtraction(): void
    {
        $calcS = new Calculator(2,3,"-");
        $resultS = $calcS->subtraction();

        $this->assertEquals(-1, $resultS);
    }
    public function testMultiplication(): void
    {
        $calcM = new Calculator(2,3,"*");
        $resultM = $calcM->multiplication();

        $this->assertEquals(6, $resultM);
    }
    public function testDivision(): void
    {
        $calcD = new Calculator(9,3,"/");
        $resultD = $calcD->division();
        $this->assertEquals(3, $resultD);
    }
    public function testDivisionByZero(): void
    {
        $calcD = new Calculator(9,0,"/");
        $this->expectExceptionMessage('Division by zero');
        $calcD->division();
    }
}

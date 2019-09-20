<?php


namespace App\Tests\unit\Salary\Calculator;


use App\Exceptions\NotImplementedException;
use App\Salary\Calculator\MordorCalculator;
use App\Tests\unit\Salary\EmployeeTrait;
use PHPUnit\Framework\TestCase;

class MordorCalculatorTest extends TestCase
{

    use EmployeeTrait;

    public function testException()
    {
        $this->expectException(NotImplementedException::class);
        $calculator = new MordorCalculator();
        $calculator->calculateNetSalary($this->getAlice());
    }
}

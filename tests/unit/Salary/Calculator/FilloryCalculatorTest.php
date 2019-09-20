<?php


namespace App\Tests\unit\Salary\Calculator;


use App\Salary\Calculator\FilloryCalculator;
use App\Salary\EmployeeInterface;
use App\Tests\unit\Salary\EmployeeTrait;
use PHPUnit\Framework\TestCase;

class FilloryCalculatorTest extends TestCase
{

    use EmployeeTrait;

    /**
     * @param EmployeeInterface $employee
     * @param int               $expected
     *
     * @dataProvider getEmployees
     */
    public function testCalculateEmployeeSalary(EmployeeInterface $employee, int $expected)
    {
        $calculator = new FilloryCalculator();
        $this->assertEquals($expected, $calculator->calculateNetSalary($employee));
    }

    public function getEmployees()
    {
        return [
            [
                $this->getAlice(),
                4800,
            ],
            [
                $this->getBob(),
                2980,
            ],
            [
                $this->getCharlie(),
                3600,
            ],
        ];
    }
}

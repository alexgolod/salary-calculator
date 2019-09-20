<?php


namespace App\Salary\Calculator;


use App\Exceptions\NotImplementedException;
use App\Salary\EmployeeInterface;

class MordorCalculator extends AbstractCountryCalculator
{

    public function calculateNetSalary(EmployeeInterface $employee): int
    {
        throw new NotImplementedException();
    }

    public static function getRules(): array
    {
        throw new NotImplementedException();
    }
}

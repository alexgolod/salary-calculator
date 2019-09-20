<?php


namespace App\Salary;


interface CountryCalculatorInterface
{

    /**
     * @param \App\Salary\EmployeeInterface $employee
     *
     * @return int
     */
    public function calculateNetSalary(EmployeeInterface $employee): int;
}

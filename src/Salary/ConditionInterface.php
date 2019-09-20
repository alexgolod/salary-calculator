<?php


namespace App\Salary;


interface ConditionInterface
{

    public function match(EmployeeInterface $employee): bool;
}

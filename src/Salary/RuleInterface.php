<?php


namespace App\Salary;


interface RuleInterface
{

    /**
     * @param \App\Salary\EmployeeInterface $employee
     * @param                                       $value
     *
     * @return mixed
     */
    public function apply(EmployeeInterface $employee, $value);
}

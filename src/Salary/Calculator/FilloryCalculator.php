<?php


namespace App\Salary\Calculator;


use App\Salary\Action\Arithmetical;
use App\Salary\Condition\Operator;
use App\Salary\EmployeeInterface;
use App\Salary\Rule\Basic;

class FilloryCalculator extends AbstractCountryCalculator
{

    protected static $_tax = 20;

    /**
     * @param \App\Salary\EmployeeInterface $employee
     *
     * @return int
     */
    public function calculateNetSalary(EmployeeInterface $employee): int
    {
        list($salary, $tax) = $this->applyRules($employee);
        $salary -= $employee->getSalary() * ($tax / 100);

        return $salary;
    }

    public static function getRules(): array
    {
        return [
            [
                'target' => 'tax',
                'rule'   => new Basic(
                    new Operator('kidsCount', '>', 2),
                    new Arithmetical('-', 2)
                ),
            ],
            [
                'target' => 'salary',
                'rule'   => new Basic(
                    new Operator('age', '>', 50),
                    new Arithmetical('*', 1.07)
                ),
            ],
            [
                'target' => 'salary',
                'rule'   => new Basic(
                    new Operator('hasCar', '==', true),
                    new Arithmetical('-', 500)
                ),
            ],
        ];
    }

}

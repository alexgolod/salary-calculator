<?php


namespace App\Salary\Calculator;


use App\Salary\CountryCalculatorInterface;
use App\Salary\EmployeeInterface;

abstract class AbstractCountryCalculator implements CountryCalculatorInterface
{

    protected static $_tax = 0;

    abstract public static function getRules(): array;

    /**
     * @param \App\Salary\EmployeeInterface $employee
     *
     * @return int
     */
    public function calculateNetSalary(EmployeeInterface $employee): int
    {
        list($salary, $tax) = $this->applyRules($employee);
        $salary -= $salary * ($tax / 100);

        return $salary;
    }

    protected function applyRules(EmployeeInterface $employee)
    {
        $tax    = static::$_tax;
        $salary = $employee->getSalary();

        foreach (static::getRules() as $item) {
            /**
             * @var $rule \App\Salary\RuleInterface
             */
            $rule = $item['rule'];
            if ('salary' === $item['target']) {
                $salary = $rule->apply($employee, $salary);
            } elseif ('tax' == $item['target']) {
                $tax = $rule->apply($employee, $tax);
            }
        }

        return [$salary, $tax];
    }
}

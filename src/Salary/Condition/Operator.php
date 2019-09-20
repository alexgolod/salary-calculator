<?php


namespace App\Salary\Condition;


use App\Salary\ConditionInterface;
use App\Salary\EmployeeInterface;

class Operator implements ConditionInterface
{

    private $_field;
    private $_operator;
    private $_value;

    /**
     * Operator constructor.
     *
     * @param $field
     * @param $operator
     * @param $value
     */
    public function __construct($field, $operator, $value)
    {
        $this->_field    = $field;
        $this->_operator = $operator;
        $this->_value    = $value;
    }

    /**
     * @param \App\Salary\EmployeeInterface $employee
     *
     * @return bool
     * @throws \Exception
     */
    public function match(EmployeeInterface $employee): bool
    {
        $getter = 'get' . ucfirst($this->_field);
        if ( ! method_exists($employee, $getter)) {
            throw new \Exception('Field not supported');
        }
        $field = call_user_func([$employee, $getter]);
        switch ($this->_operator) {
            case '>':
                return $field > $this->_value;
                break;
            case '<':
                return $field < $this->_value;
                break;
            case '==':
                return $field == $this->_value;
                break;

        }

        return false;
    }
}

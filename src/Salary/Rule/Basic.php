<?php

namespace App\Salary\Rule;


use App\Salary\ActionInterface;
use App\Salary\ConditionInterface;
use App\Salary\EmployeeInterface;
use App\Salary\RuleInterface;

class Basic implements RuleInterface
{

    /**
     * @var ConditionInterface
     */
    private $_condition;
    /**
     * @var ActionInterface
     */
    private $_action;

    /**
     * Basic constructor.
     *
     * @param \App\Salary\ConditionInterface $_condition
     * @param \App\Salary\ActionInterface    $_action
     */
    public function __construct(
        \App\Salary\ConditionInterface $_condition,
        \App\Salary\ActionInterface $_action
    ) {
        $this->_condition = $_condition;
        $this->_action    = $_action;
    }


    /**
     * @param \App\Salary\EmployeeInterface $employee
     * @param                                       $value
     *
     * @return mixed
     */
    public function apply(EmployeeInterface $employee, $value)
    {
        if ($this->_condition->match($employee)) {
            return $this->_action->apply($value);
        }

        return $value;
    }
}

<?php

namespace App\Salary\Action;


use App\Salary\ActionInterface;

class Arithmetical implements ActionInterface
{


    private $_action;
    private $_value;

    /**
     * Arithmetical constructor.
     *
     * @param $action
     * @param $value
     */
    public function __construct($action, $value)
    {
        $this->_action = $action;
        $this->_value = $value;
    }


    /**
     * @param mixed $target
     *
     * @return int
     */
    public function apply($target): int
    {
        switch ($this->_action) {
            case '*':
                $target *= $this->_value;
                break;
            case '-':
                $target -= $this->_value;
                break;
            case '+':
                $target += $this->_value;
                break;

        }

        return $target;
    }
}

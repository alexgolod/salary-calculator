<?php


namespace App\Tests\unit\Salary\Condition;


use App\Entity\Employee;
use App\Salary\Condition\Operator;
use App\Tests\unit\Salary\EmployeeTrait;
use App\Type\CountryEnum;
use PHPUnit\Framework\TestCase;

class OperatorTest extends TestCase
{

    use EmployeeTrait;

    public function testOperators()
    {

        $this->assertTrue(
            (new Operator('age', '>', 50))->match($this->getBob())
        );
        $this->assertFalse(
            (new Operator('age', '<', 50))->match($this->getBob())
        );
        $this->assertTrue(
            (new Operator('hasCar', '==', true))->match($this->getBob())
        );
        $this->assertFalse(
            (new Operator('hasCar', '==', false))->match($this->getBob())
        );
        $this->assertFalse(
            (new Operator('kidsCount', '>', 2))->match($this->getBob())
        );
        $this->assertTrue(
            (new Operator('kidsCount', '>', 2))->match($this->getCharlie())
        );
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        (new Operator('notAge', '>', 50))->match($this->getBob());
    }
}

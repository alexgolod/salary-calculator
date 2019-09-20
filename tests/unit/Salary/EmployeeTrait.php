<?php


namespace App\Tests\unit\Salary;


use App\Controller\SalaryController;
use App\Entity\Employee;
use App\Type\CountryEnum;

trait EmployeeTrait
{

    public function getAlice()
    {
        return new Employee('Alice', 6000, 2, CountryEnum::Fillory(), 26, false);
    }

    public function getBob()
    {
        return new Employee('Bob', 4000, 0, CountryEnum::Fillory(), 52, true);
    }

    public function getCharlie()
    {
        return new Employee('Charlie', 5000, 3, CountryEnum::Fillory(), 36, true);
    }
}

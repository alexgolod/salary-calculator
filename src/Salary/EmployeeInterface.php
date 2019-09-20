<?php


namespace App\Salary;


use App\Type\CountryEnum;

interface EmployeeInterface
{

    public function getSalary(): int;

    public function getAge(): int;

    public function getKidsCount(): int;

    public function getHasCar(): bool;

    public function getCountry(): CountryEnum;
}

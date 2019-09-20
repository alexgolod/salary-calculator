<?php


namespace App\Service;


use App\Exceptions\NotImplementedException;
use App\Salary\CountryCalculatorInterface;
use App\Salary\EmployeeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SalaryService
{

    /**
     * @var ContainerInterface
     */
    private $container;


    /**
     * SalaryService constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @param \App\Salary\EmployeeInterface $employee
     *
     * @return int
     * @throws \App\Exceptions\NotImplementedException
     */
    public function calculateNet(EmployeeInterface $employee): int
    {
        return $this->__getCalculator($employee)
                    ->calculateNetSalary($employee);
    }

    /**
     * @param \App\Salary\EmployeeInterface $employee
     *
     * @return \App\Salary\CountryCalculatorInterface
     * @throws \App\Exceptions\NotImplementedException
     */
    private function __getCalculator(EmployeeInterface $employee): CountryCalculatorInterface
    {
        $country    = $employee->getCountry()->getKey();
        $calculator = "App\\Salary\\Calculator\\{$country}Calculator";
        if ( ! $this->container->has($calculator)) {
            throw new NotImplementedException("Calculator for '$country' not found");
        }

        return $this->container->get($calculator);
    }
}

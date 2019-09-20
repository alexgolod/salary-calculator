<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Service\SalaryService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;


class SalaryController extends AbstractFOSRestController
{

    private const DEFAULT_COUNTRY = 1;

    /**
     * @param \App\Service\SalaryService $salaryService
     *
     * @Route("/salary/calculate", name="salary")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \App\Exceptions\NotImplementedException
     */
    public function calculate(SalaryService $salaryService)
    {
        $result = [];
        /**
         * @var $employees Employee[]
         */
        $employees = $this->getDoctrine()
                          ->getRepository(Employee::class)
                          ->findBy(['country' => self::DEFAULT_COUNTRY]);
        foreach ($employees as $employee) {
            $result[] = [
                'net'    => $salaryService->calculateNet($employee),
                'entity' => $employee,
            ];
        }


        return $this->handleView($this->view($result)->setFormat('json'));
    }
}

<?php

namespace App\Entity;

use App\Salary\EmployeeInterface;
use App\Type\CountryEnum;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 */
class Employee implements EmployeeInterface
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $salary;


    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $kidsCount;

    /**
     * @ORM\Column(type="country_enum")
     * @JMS\Accessor(getter="getCountryInteger")
     * @var CountryEnum
     */
    private $country;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $age;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $hasCar;

    /**
     * Employee constructor.
     *
     * @param string                $name
     * @param int                   $salary
     * @param int                   $kidsCount
     * @param \App\Type\CountryEnum $country
     * @param int                   $age
     * @param bool                  $hasCar
     */
    public function __construct(
        string $name,
        int $salary,
        int $kidsCount,
        \App\Type\CountryEnum $country,
        int $age,
        bool $hasCar
    ) {
        $this->name      = $name;
        $this->salary    = $salary;
        $this->kidsCount = $kidsCount;
        $this->country   = $country;
        $this->age       = $age;
        $this->hasCar    = $hasCar;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @param int $salary
     */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getKidsCount(): int
    {
        return $this->kidsCount;
    }

    /**
     * @param int $kidsCount
     */
    public function setKidsCount(int $kidsCount): void
    {
        $this->kidsCount = $kidsCount;
    }

    /**
     * @return CountryEnum
     */
    public function getCountry(): CountryEnum
    {
        return $this->country;
    }

    /**
     * @return int
     */
    public function getCountryInteger(): int
    {
        return (int)$this->country->getValue();
    }

    /**
     * @param int $country
     */
    public function setCountry(int $country): void
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return bool
     */
    public function getHasCar(): bool
    {
        return $this->hasCar;
    }

    /**
     * @param bool $hasCar
     */
    public function setHasCar(bool $hasCar): void
    {
        $this->hasCar = $hasCar;
    }

}

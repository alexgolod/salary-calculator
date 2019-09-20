<?php


namespace App\Tests\unit\Salary\Action;


use App\Salary\Action\Arithmetical;
use PHPUnit\Framework\TestCase;

class ArithmeticalTest extends TestCase
{

    public function testActions()
    {
        $this->assertEquals(
            356,
            (new Arithmetical('+', 24))->apply(332)
        );

        $this->assertEquals(
            -865,
            (new Arithmetical('-', 1565))->apply(700)
        );

        $this->assertEquals(
            1024,
            (new Arithmetical('*', 32))->apply(32)
        );
    }
}

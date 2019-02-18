<?php
namespace Domain\Customer\Tax;

use PHPUnit\Framework\TestCase;

class NPTest extends TestCase
{
    public function testCountVat()
    {
        $np = new NP();
        $price = 100;
        self::assertEquals(0, $np->countVat($price));
    }
}

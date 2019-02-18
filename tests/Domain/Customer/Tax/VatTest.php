<?php
namespace Domain\Customer\Tax;

use PHPUnit\Framework\TestCase;

class VatTest extends TestCase
{
    public function testCountVat()
    {
        $vat = new Vat();
        $price = 100.00;
        self::assertEquals($price * 0.23, $vat->countVat($price));
    }

    public function testVatShouldBeFloat()
    {
        $vat = new Vat();
        $price = 123.23;
        self::assertSame(round($price * .23, 2), $vat->countVat($price));
    }
}

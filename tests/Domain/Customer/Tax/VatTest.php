<?php
namespace Domain\Customer\Tax;

use PHPUnit\Framework\TestCase;

class VatTest extends TestCase
{
    /**
     * Dublujące się testy, sprawdzające dokładnie to samo. Wystarczyłby ten drugi
     */


    public function testCountVat()
    {
        $vat = new Polish();
        $price = 100.00;
        self::assertEquals($price * 0.23, $vat->countVat($price));
    }

    public function testVatShouldBeFloat()
    {
        $vat = new Polish();
        $price = 123.23;
        self::assertSame(round($price * .23, 2), $vat->countVat($price));
    }
}

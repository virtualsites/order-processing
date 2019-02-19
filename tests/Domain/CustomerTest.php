<?php
namespace Domain;

use Domain\Customer\Address;
use Domain\Customer\Vat;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

class CustomerTest extends TestCase
{
    public function testGetVat()
    {
        /** @var Vat|ObjectProphecy $tax */
        /**
         * Błędne użycie spy - w tym wypadku zupełnie nieuzasadnione
         */
        $tax = $this->prophesize(Vat::class);

        $tax->calculate($price = 44.30)->shouldBeCalled();
        $customer = new Customer(
            new Address(
                'street',
                '44-100',
                'Gliwice',
                'Polska'
            ),
            $tax->reveal(),
            'name'
        );
        $customer->getVatPrice($price);
    }
}

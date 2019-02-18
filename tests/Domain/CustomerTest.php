<?php
namespace Domain;

use Domain\Customer\Address;
use Domain\Customer\Tax;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

class CustomerTest extends TestCase
{
    public function testGetVat()
    {
        /** @var Tax|ObjectProphecy $tax */
        $tax = $this->prophesize(Tax::class);
        $tax->countVat($price = 44.30)->shouldBeCalled();
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

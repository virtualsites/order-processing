<?php
declare(strict_types=1);

namespace Domain;

use Domain\Customer\Address;
use Domain\Customer\CustomerInterface;
use Domain\Customer\Tax;

class Customer implements CustomerInterface
{
    private $address;
    private $tax;
    private $name;

    public function __construct(Address $address, Tax $tax, string $name)
    {
        $this->address = $address;
        $this->tax = $tax;
        $this->name = $name;
    }

    public function getVatPrice(float $price): float
    {
        return $this->tax->countVat($price);
    }
}

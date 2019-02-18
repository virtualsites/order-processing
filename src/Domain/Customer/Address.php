<?php
declare(strict_types=1);

namespace Domain\Customer;

class Address
{
    private $street;
    private $code;
    private $city;
    private $country;

    public function __construct(string $street, string $code, string $city, string $country)
    {
        $this->street = $street;
        $this->code = $code;
        $this->city = $city;
        $this->country = $country;
    }
}

<?php
declare(strict_types=1);

namespace Domain;

use Domain\Customer\Address;
use Domain\Customer\CustomerInterface;
use Domain\Customer\Vat;

/**
 * Ta klasa powinna być umieszczona raczej w obrębie swojej domeny, czyli katalogu Customer
 */
class Customer implements CustomerInterface
{
    private $address;
    private $name;

    /** Bez vat - wyjaśnione w innym miejscu
      Brakuje kraju.
      Nie ma możliwości dynamicznej zmiany strategii

     */
    public function __construct(Address $address, string $name)
    {
        $this->address = $address;
        $this->name = $name;
    }

    /**
     * Customer nie powinien wiedzieć NIC o vat
     * Nie jest to odpowiednie miejsce dla tej logiki
     */
}

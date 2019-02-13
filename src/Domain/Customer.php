<?php
declare(strict_types=1);

namespace Domain;

use Domain\Customer\CustomerInterface;

class Customer implements CustomerInterface
{
    public function getVat(): int
    {
    }
}

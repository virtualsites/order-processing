<?php
declare(strict_types=1);

namespace Domain\Customer\Tax;

use Domain\Customer\Tax;

class Vat implements Tax
{
    public function countVat(float $price): float
    {
        return round($price * .23, 2);
    }
}

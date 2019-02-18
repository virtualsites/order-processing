<?php
declare(strict_types=1);

namespace Domain\Customer\Tax;

use Domain\Customer\Tax;

class NP implements Tax
{
    public function countVat(float $price): float
    {
        return $price * 0;
    }
}

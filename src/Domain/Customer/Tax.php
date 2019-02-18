<?php
declare(strict_types=1);

namespace Domain\Customer;

interface Tax
{
    public function countVat(float $price): float;
}

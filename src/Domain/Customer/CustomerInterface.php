<?php
declare(strict_types=1);

namespace Domain\Customer;

interface CustomerInterface
{
    public function getVat(): int;
}

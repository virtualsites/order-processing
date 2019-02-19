<?php
declare(strict_types=1);

namespace Domain\Customer\Tax;

use Domain\Customer\Vat;

class NP implements Vat
{
    /**
     * Bardziej calculate
     */
    public function calculate(float $price): float
    {
        // wartość vat w tym przypadku to po prostu 0, po co przemnażać wartość przez 0 ????
        return $price * 0;
    }
}

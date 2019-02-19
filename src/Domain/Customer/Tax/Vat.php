<?php
declare(strict_types=1);

namespace Domain\Customer;

/**
 * Lepszą nazwą byłoby "VAT"
 * Podaktów jest wiele
 */
interface Vat
{
    public function calculate(float $price): float;
}

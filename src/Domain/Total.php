<?php
declare(strict_types=1);

namespace Domain;

/**
 * Jaki jest cel istnienia tej klasy?
 * Czym jest ona lepsza od właściwości float wewnątrz klasy Order?
 * W tej postaci jest to przerost formy
 */
class Total implements TotalInterface
{
    private $value;

    /**
     * Nie widzę potrzeby istnienia tej metody
     */

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function add(float $value): void
    {
        $this->value += $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}

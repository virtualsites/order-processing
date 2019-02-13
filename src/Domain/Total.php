<?php
declare(strict_types=1);

namespace Domain;

class Total implements TotalInterface
{
    private $value;

    public static function zero() : Total
    {
        return new self(00.00);
    }

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function add(float $value): void
    {
        $this->value += $value;
    }

    public function toFloat(): float
    {
        return $this->value;
    }
}

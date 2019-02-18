<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemInterface;

class Item implements ItemInterface
{
    private $name;
    private $price;
    private $vat;

    public function __construct(string $name, float $price, float $vat = 0.00)
    {
        $this->name = $name;
        $this->price = $price;
        $this->vat = $vat;
    }

    public function getTotalPrice(): float
    {
        return round($this->price + $this->vat, 2);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

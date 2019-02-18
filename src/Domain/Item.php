<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemInterface;

class Item implements ItemInterface
{
    private $name;
    private $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return round($this->price, 2);
    }
}

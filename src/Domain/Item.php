<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemInterface;

class Item implements ItemInterface
{
    private $name;
    private $price;
    private $quantity;
    private $availableQuantity;
    private $vat;

    public function __construct(
        string $name,
        float $price,
        int $quantity,
        int $availableQuantity,
        float $vat = 0.00
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->availableQuantity = $availableQuantity;
        $this->vat = $vat;
    }

    public function getTotalPrice(): float
    {
        return round($this->price + $this->vat, 2);
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function isAvailable(): bool
    {
        return $this->quantity <= $this->availableQuantity;
    }

    public function withVat(float $vat): Item
    {
        $clone = clone $this;
        $clone->vat = $vat;

        return $clone;
    }
}

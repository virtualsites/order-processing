<?php
declare(strict_types=1);

namespace Domain\Item;

use Domain\Item;

interface ItemInterface
{
    public function getTotalPrice(): float;
    public function getPrice(): float;
    public function isAvailable(): bool;
    public function withVat(float $getVatPrice) : Item;
}

<?php
declare(strict_types=1);

namespace Domain\Item;

interface ItemInterface
{
    public function getPrice(): float;
}

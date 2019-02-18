<?php
declare(strict_types=1);

namespace Domain\Item;

interface ItemInterface
{
    public function getTotalPrice(): float;
    public function getName(): string;
    public function getPrice(): float;
}

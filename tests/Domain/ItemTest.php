<?php
declare(strict_types=1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testGetTotalPriceShouldBeFloat(): void
    {
        $item = new Item('foo', 45);
        self::assertIsFloat($item->getTotalPrice());
    }

    public function testGetTotalPriceRoundedWithTwoPrecision(): void
    {
        $item = new Item('foo', 45.456);
        self::assertSame(45.46, $item->getTotalPrice());
    }

    public function testGetTotalPriceWithPolishVat(): void
    {
        $item = new Item('foo', 100, 23);
        self::assertSame(123.0, $item->getTotalPrice());
    }
}

<?php
declare(strict_types=1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testGetPriceShouldBeFloat(): void
    {
        $item = new Item('foo', 45);
        self::assertIsFloat($item->getPrice());
    }

    public function testGetPriceRoundedWithTwoPrecision(): void
    {
        $item = new Item('foo', 45.456);
        self::assertSame(45.46, $item->getPrice());
    }
}

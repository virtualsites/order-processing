<?php
declare(strict_types=1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /** Zbędny test */



    public function testGetTotalPriceRoundedWithTwoPrecision(): void
    {
        $item = new Item('foo', 45.456, 1, 1);
        self::assertSame(45.46, $item->getTotalPrice());
    }

    public function testGetTotalPriceWithPolishVat(): void
    {
        $item = new Item('foo', 100, 1, 1, 23);
        self::assertSame(123.0, $item->getTotalPrice());
    }

    /**
     * Brakuje testu "not available"
     * Brakuje testów dla warunków brzegowych
     */
    public function testIsAvailable(): void
    {
        $item = new Item('foo', 100, 1, 1);
        self::assertTrue($item->isAvailable());
    }

    public function testCreateItemWithAdditionalVatPrice(): void
    {
        $item = new Item('foo', 100, 1, 1);
        self::assertInstanceOf(Item::class, $item->withVat(23));
    }
}

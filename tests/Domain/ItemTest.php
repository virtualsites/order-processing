<?php
declare(strict_types=1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testGetPrice(): void
    {
        $item = new Item('foo', 45);
        self::assertIsFloat($item->getPrice());
    }
}

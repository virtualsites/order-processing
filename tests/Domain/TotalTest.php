<?php
declare(strict_types=1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class TotalTest extends TestCase
{
    public function testAdd(): void
    {
        // arrange
        $a = 345.09;
        $b = 45.32;
        $total = Total::zero();
        // act
        $total->add($a);
        $total->add($b);
        // assert
        self::assertSame($a + $b, $total->toFloat());
    }
}

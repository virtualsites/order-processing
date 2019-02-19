<?php
declare(strict_types=1);

namespace Domain;

use PHPUnit\Framework\TestCase;

/**Zbedny test, zbedna klasa**/
class TotalTest extends TestCase
{
    public function testAdd(): void
    {
        // arrange

        /**
         * Zmienne a i b - grzech ciężki!
         */
        $a = 345.09;
        $b = 45.32;
        $total = Total::zero();

        // act
        $total->add($a);
        $total->add($b);

        // assert
        /** Powinna być wpisana wartość, a nie $a + $b */
        self::assertSame($a + $b, $total->toFloat());
    }
}

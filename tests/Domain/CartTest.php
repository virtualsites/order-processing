<?php
declare(strict_types=1);

namespace Domain;

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testProductBoughtByPolish(): void
    {
        // arrange
        $cart = Cart::empty();
        // act
        $cart->addItem(new Item('okulary', 50.59));
        $cart->addItem(new Item('bluzka', 120.75));
        // assert
        self::assertInstanceOf(Order::class, $cart->createOrder());
    }
}

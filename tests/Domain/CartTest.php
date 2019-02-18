<?php
declare(strict_types=1);

namespace Domain;

use Domain\Customer\Tax\Vat;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testProductBoughtByPolish(): void
    {
        // arrange
        $cart = Cart::forPolishCustomer();
        // act
        $cart->addItem($item1 = new Item('okulary', 50.59));
        $cart->addItem($item2 = new Item('bluzka', 120.75));
        $total = $item1->getPrice() + $item2->getPrice();
        // assert
        self::assertInstanceOf(Order::class, $cart->createOrder());
        self::assertSame(
            $total + (new Vat())->countVat($total),
            $cart->getTotal()
        );
    }

    public function testProductBoughtByUECitizen(): void
    {
        // arrange
        $cart = Cart::forUECitizen();
        // act
        $cart->addItem($item1 = new Item('hat', 150.59));
        $cart->addItem($item2 = new Item('t-shirt', 20.79));
        // assert
        self::assertInstanceOf(Order::class, $cart->createOrder());
        self::assertSame(
            $item1->getPrice() + $item2->getPrice(),
            $cart->getTotal()
        );
    }
}

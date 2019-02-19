<?php
declare(strict_types=1);

namespace Domain;

use Domain\Customer\Address;
use Domain\Customer\Tax\NP;
use Domain\Customer\Tax\Vat;
use Domain\Item\ItemsCollection;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testProductBoughtByPolish(): void
    {
        // arrange
        $cart = $this->createPolishCustomerCart();

        // act
        $cart->addItem($item1 = new Item('okulary', 50.59, 1, 1));
        $cart->addItem($item2 = new Item('bluzka', 120.75, 1, 1));
        $total = $item1->getTotalPrice() + $item2->getTotalPrice();
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
        $cart = $this->createEUCustomerCart();
        // act
        $cart->addItem($item1 = new Item('hat', 150.59, 1, 1));
        $cart->addItem($item2 = new Item('t-shirt', 20.79, 1, 1));
        // assert
        self::assertInstanceOf(Order::class, $cart->createOrder());
        self::assertSame(
            $item1->getTotalPrice() + $item2->getTotalPrice(),
            $cart->getTotal()
        );
    }

    public function testProductIsNotAvailableInStoreWithProvidedQuantity(): void
    {
        // arrange
        $cart = $this->createEUCustomerCart();
        // assert
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Products are not available in store with provided quantity');
        // act
        $cart->addItem($item1 = new Item('hat', 150.59, 3, 2));
    }


    /**
     * Te dwie, poniższe metody są helperami do tworzenia obiektów typu Cart.
     * Nie powinny jednak znaleźć się w samej klasie Cart, ponieważ zmieniasz kod domenowy.
     */
    private function createPolishCustomerCart() : Cart
    {
        return new Cart(
            new Customer(
                new Address(
                    'Al. Jana Pawła',
                    '43-100',
                    'Tychy',
                    'Polska'
                ),
                new Vat(),
                'Jan Kowalski'
            ),
            new ItemsCollection()
        );
    }

    private function createEUCustomerCart() : Cart
    {
        return new Cart(
            new Customer(
                new Address(
                    'Any street',
                    '342-01',
                    'Xxx',
                    'Yyy'
                ),
                new NP(),
                'Jan Kowalski'
            ),
            new ItemsCollection()
        );
    }
}

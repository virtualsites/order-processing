<?php
declare(strict_types=1);

namespace Domain;

use Domain\Customer\Address;
use Domain\Customer\Tax\Vat;
use Domain\Item\ItemInterface;
use Domain\Item\ItemsCollection;

class Cart
{
    private $customer;
    private $items;
    /** @var Total */
    private $total;

    public static function forPolishCustomer() : Cart
    {
        return new self(
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

    public function __construct(Customer $customer, ItemsCollection $items)
    {
        $this->customer = $customer;
        $this->items = $items;
        $this->initTotal();
    }

    public function addItem(ItemInterface $item) : void
    {
        $this->items->add($item);
        $this->total->add($this->priceWithTax($item));
    }

    public function getTotal() : float
    {
        return $this->total ->toFloat();
    }

    public function createOrder() : Order
    {
        return new Order($this->customer, $this->items, $this->total);
    }

    private function initTotal() : void
    {
        $this->total = new Total(00.00);

        /** @var Item $item */
        foreach ($this->items as $item) {
            $this->total->add($this->priceWithTax($item));
        }
    }

    private function priceWithTax(ItemInterface $item) : float
    {
        return $item->getPrice() + $this->customer->getVatPrice($item->getPrice());
    }
}

<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemInterface;
use Domain\Item\ItemsCollection;

class Cart
{
    private $customer;
    private $items;
    /** @var Total */
    private $total;

    public static function empty() : Cart
    {
        return new self(new Customer(), new ItemsCollection());
    }

    public function __construct(Customer $customer, ItemsCollection $items)
    {
        $this->customer = $customer;
        $this->items = $items;
        $this->initTotal();
    }

    public function addItem(ItemInterface $item): void
    {
        $this->items->add($item);
        $this->total->add($item->getPrice());
    }

    public function getTotal(): float
    {
        return $this->total->toFloat();
    }

    private function initTotal() : void
    {
        $this->total = new Total(00.00);

        /** @var Item $item */
        foreach ($this->items as $item) {
            $this->total->add($item->getPrice());
        }
    }

    public function createOrder() : Order
    {
        return new Order($this->customer, $this->items, $this->total);
    }
}

<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemInterface;
use Domain\Item\ItemsCollection;

class Cart
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var ItemsCollection
     */
    private $items;

    /** @var Total */
    private $total;

    public function __construct(Customer $customer, ItemsCollection $items)
    {
        $this->customer = $customer;
        $this->items = $items;
        $this->initTotal();
    }

    /**
     * @param ItemInterface $item
     * @throws \RuntimeException
     */
    public function addItem(ItemInterface $item) : void
    {
        if (false === $item->isAvailable()) {
            throw new \RuntimeException('Products are not available in store with provided quantity');
        }

        $this->items->add(
            $cartItem = $item->withVat($this->customer->getVatPrice($item->getPrice()))
        );
        $this->total->add($cartItem->getTotalPrice());
    }

    public function getTotal() : float
    {
        return $this->total->toFloat();
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
            $this->total->add($item->getTotalPrice());
        }
    }
}

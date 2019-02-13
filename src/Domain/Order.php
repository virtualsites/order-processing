<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemsCollection;

class Order
{
    private $customer;
    private $items;
    private $total;

    public function __construct(Customer $customer, ItemsCollection $items, Total $total)
    {
        $this->customer = $customer;
        $this->items = $items;
        $this->total = $total;
    }
}

<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemsCollection;

/**
 * Order powinnien mieć jednak więcej odpowiedzialności
 * Za dużo logiki przeniosłasz do encji, zwiększając ich odpowiedzialność, jednocześnie pozbawiając tą klasę sensu bycia
 */
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

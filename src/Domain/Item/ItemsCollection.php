<?php
declare(strict_types=1);

namespace Domain\Item;

use Domain\Collection;
use Domain\Item;

class ItemsCollection extends Collection
{
    public function __construct(array $items = [])
    {
        parent::__construct(array_map(
            function ($item) {
                return new Item($item['name'], $item['price']);
            },
            $items
        ));
    }
}

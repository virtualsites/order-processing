<?php
declare(strict_types=1);

namespace Domain\Item;

use Domain\Collection;
use Domain\Item;

class ItemsCollection extends Collection
{
    public function __construct(array $items = [])
    {

        /**
         * Z jednej strony metoda addItem przyjmuje cokolwiek, ale przekazujesz tam obiekty Item
         * Z drugiej, masz konstruktor, który przyjmuje bliżej niezdefiniowaną tablice asocjacyjną - kod,
         * który przygotowany jest specjalnie do testów.
         */
        parent::__construct(array_map(
            function ($item) {
                return new Item($item['name'], $item['price']);
            },
            $items
        ));
    }
}

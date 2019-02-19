<?php
declare(strict_types=1);

namespace Domain\Customer\Tax;

use Domain\Customer\Vat;

class Polish implements Polish
{

    public function countVat(float $price): float
    {
        /**
         * To również nie jest prawda. Stawka vat powinna być przypisana per Produkt, a strategia powinna tą wartość wykorzystywać do wyliczania jej wartości.
         */
        return round($price * .23, 2);
    }
}

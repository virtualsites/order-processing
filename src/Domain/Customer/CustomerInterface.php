<?php
declare(strict_types=1);

namespace Domain\Customer;

interface CustomerInterface
{

    /**
     * Wiedza o VAT nie jest odpowiedzialnością Klienta.
     * Potrzebujesz znać jego kraj. I tyle.
     * A to program powinien dobrać strategie w zależności od tego w ramach jakiego prawa (którego kraju) działa
     *
     * Tej metody nie powinno tutaj być.
     */
    public function getVatPrice(float $price): float;
}

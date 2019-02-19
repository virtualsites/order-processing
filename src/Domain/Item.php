<?php
declare(strict_types=1);

namespace Domain;

use Domain\Item\ItemInterface;

class Item implements ItemInterface
{
    private $name;
    private $price;
    private $quantity;
    private $availableQuantity;
    private $vat;


    /**
     * Dlaczego obiekt Item posiada właściwość "$availableQuantity" - to nie jest jego odpowiedzialność.
     * Wymieszałaś odpowiedzialność produktu oraz elementu zamówienia. Brakuje encji Product, a Item powinno być Order/Item.
     * Słowo Item jest zbyt generyczne i może oznaczać wszystko
     */
    public function __construct(
        string $name,
        float $price,
        int $quantity,
        int $availableQuantity,
        float $vat = 0.00
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->availableQuantity = $availableQuantity;
        $this->vat = $vat;
    }

    public function getTotalPrice(): float
    {
        /**
         * + za zaokrąglenie
         */
        return round($this->price + $this->vat, 2);
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    /** Zbyt duża odpowiedzialność. Ani to nie pasuje do produktu, ani do Order Item */
    public function isAvailable(): bool
    {
        return $this->quantity <= $this->availableQuantity;
    }

    /**
     * Zbyt szeroka odpowiedzialność. Dla order Item, to mógłby być "named constructor", ale nie dla Produktu
     * VAT jest ustawiony per produkt i jest stały. A ewentualna zmiana strategii obliczania vat powinna nastąpić dla całego zamówienia.
     */
    public function withVat(float $vat): Item
    {
        $clone = clone $this;
        $clone->vat = $vat;

        return $clone;
    }
}

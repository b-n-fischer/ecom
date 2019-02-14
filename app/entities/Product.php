<?php

namespace App\Entities;

use \App\services\TaxCalculator;
use Money\Money;

class Product {

    private $name;
    private $price;
    private $taxCalculator;

    /**
     * Constructor
     *
     * @param string $name
     * @param Money $price
     * @param TaxCalculator $taxation
     */
    public function __construct(
        string $name,
        Money $price, 
        TaxCalculator $taxCalculator
        ) {
        $this->name = $name;
        $this->price = $price;
        $this->taxCalculator = $taxCalculator;
    }

    /**
     * Getter methode $name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Getter methode $taxation
     *
     * @return float
     */
    public function getTaxation(): float {
        return $this->taxCalculator->getTaxation();
    }

    /**
     * Getter methode $price
     *
     * @return Money
     */
    public function getPrice(): Money {
        return $this->price;
    }

    /**
     * This methode returns the price with taxes
     *
     * @return Money
     */
    public function getGross(): Money {
        return $this->price->add($this->taxCalculator->getTax($this->price));
    }
}

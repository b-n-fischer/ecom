<?php

namespace App\Services;
use Money\Money;

class TaxCalculator {

    private $taxation;

    /**
     * Constructor
     *
     * @param float $taxation
     */
    public function __construct(float $taxation) {
        $this->taxation = $taxation;    
    }

    /**
     * Getter methode $taxation
     *
     * @return float
     */
    public function getTaxation(): float {
        return $this->taxation;
    }

    /**
     * return tax from netPrice
     *
     * @return Money
     */
    public function getTax(Money $netPrice): Money {
        return $netPrice->multiply(($this->taxation / 100));
    }
}

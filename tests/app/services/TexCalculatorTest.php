<?php

use \App\Services\TaxCalculator;
use Money\Money;

class TaxCalculatorTest extends \PHPUnit\Framework\TestCase {

    public function testGetTaxFromNetPrice() {
        $taxCalculator = new TaxCalculator(19);
        $this->assertEquals(Money::EUR(190), $taxCalculator->getTax(Money::EUR(1000)));
    }
}

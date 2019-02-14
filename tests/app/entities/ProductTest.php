<?php

use \App\Entities\Product;
use \App\Services\TaxCalculator;
use Money\Money;

class ProductTest extends \PHPUnit\Framework\TestCase {

    public function testGetNetAmount() {
        $product = new Product('apple', Money::EUR(1000), new TaxCalculator(19));
        $this->assertEquals(Money::EUR(1000), $product->getPrice());
    }

    public function testGetGross() {
        $product = new Product('apple', Money::EUR(1000), new TaxCalculator(19));
        $this->assertEquals($product->getGross(), Money::EUR(1190));
    }
}

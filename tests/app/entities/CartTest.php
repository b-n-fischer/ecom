<?php

use \App\Entities\Cart;
use \App\Entities\Product;
use \App\Services\TaxCalculator;
use Money\Money;

class CartTest extends \PHPUnit\Framework\TestCase {

    public function testGetTotalNetAmount() {
        $product = new Product('apple', Money::EUR(1000), new TaxCalculator(19));
        $cart = new Cart();
        $cart->add($product);  
        $this->assertEquals(Money::EUR(1000), $cart->getTotalNetAmount());
    }

    public function testGetTotalNetAmounts() {
        $product = new Product('apple', Money::EUR(1000), new TaxCalculator(19));
        $cart = new Cart();
        $cart->addMany(array($product, $product, $product));  
        $this->assertEquals(Money::EUR(3000), $cart->getTotalNetAmount());
    }

    public function testGetTotalNetAmountsWithEmptyCart() {
        $cart = new Cart();
        $this->assertEquals(Money::EUR(0), $cart->getTotalNetAmount());
    }

    public function testGetTotalGross() {
        $product = new Product('apple', Money::EUR(1000), new TaxCalculator(19));
        $cart = new Cart();
        $cart->addMany(array($product, $product, $product));  
        $this->assertEquals(Money::EUR(3570), $cart->getTotalGross());
    }

    public function testGetTotalGrossWithdecimalValues() {
        $product = new Product('apple', Money::EUR(3459), new TaxCalculator(19));
        $cart = new Cart();
        $cart->addMany(array($product, $product, $product));  
        $this->assertEquals(Money::EUR(12348), $cart->getTotalGross());
    }

    public function testGetTotalGrossWithEmptyCart() {
        $cart = new Cart();
        $this->assertEquals(Money::EUR(0), $cart->getTotalNetAmount());
    }

    public function testGetTotalGrossWithDifferentTaxations() {
        $apple = new Product('apple', Money::EUR(1000), new TaxCalculator(19));
        $orange = new Product('orange', Money::EUR(1000), new TaxCalculator(7));
        $cart = new Cart();
        $cart->addMany(array($apple, $orange));  
        $this->assertEquals(Money::EUR(2260), $cart->getTotalGross());
    }

}

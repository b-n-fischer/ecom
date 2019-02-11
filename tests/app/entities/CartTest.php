<?php

use \App\Entities\Cart;
use \App\Entities\Product;

class CartTest extends \PHPUnit\Framework\TestCase {

    public function testGetTotalNetAmount() {
        $product = new Product('apple', 10, 19);
        $cart = new Cart();
        $cart->add($product);  
        $this->assertEquals(10, $cart->getTotalNetAmount());
    }

    public function testGetTotalNetAmounts() {
        $product = new Product('apple', 10, 19);
        $cart = new Cart();
        $cart->addMany(array($product, $product, $product));  
        $this->assertEquals(30, $cart->getTotalNetAmount());
    }

    public function testGetTotalNetAmountsWithEmptyCart() {
        $cart = new Cart();
        $this->assertEquals(0, $cart->getTotalNetAmount());
    }

    public function testGetTotalGross() {
        $product = new Product('apple', 10, 19);
        $cart = new Cart();
        $cart->addMany(array($product, $product, $product));  
        $this->assertEquals(35.7, $cart->getTotalGross());
    }

    public function testGetTotalGrossWithEmptyCart() {
        $cart = new Cart();
        $this->assertEquals(0, $cart->getTotalNetAmount());
    }

    public function testGetTotalGrossWithDifferentTaxations() {
        $apple = new Product('apple', 10, 19);
        $orange = new Product('orange', 10, 7);
        $cart = new Cart();
        $cart->addMany(array($apple, $orange));  
        $this->assertEquals(22.6, $cart->getTotalGross());
    }

}

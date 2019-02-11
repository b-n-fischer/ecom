<?php

use \App\Entities\Product;

class ProductTest extends \PHPUnit\Framework\TestCase {

    public function testGetNetAmount() {
        $product = new Product('apple', 10, 19);
        $this->assertEquals(10, $product->getNetAmount());
    }

    public function testGetGross() {
        $product = new Product('apple', 10, 19);
        $this->assertEquals($product->getGross(), 11.9);
    }
}

<?php

namespace App\Entities;

use Money\Money;

class Cart {

    /**
     * Array of products
     *
     * @var array
     */
    private $items = [];

    /**
     * This methode add product in cart
     *
     * @param Product $orderItem
     * @return void
     */
    public function add(Product $orderItem) {
        array_push($this->items, $orderItem);
    }

    /**
     * This methode add array of prducts in cart
     *
     * @param array $orderItems
     * @return void
     */
    public function addMany(array $orderItems) {
        $this->items = array_merge($this->items, $orderItems);
    }

    /**
     * This methode sums up the prices of all items
     *
     * @return Money
     */
    public function getTotalNetAmount(): Money {
        return array_reduce($this->items, function($sum, $item){
            return $sum->add($item->getPrice());
        },  Money::EUR(0));
    }

    /**
     * This methode sums up the prices with taxes of all items
     *
     * @return Money
     */
    public function getTotalGross(): Money {
        return array_reduce($this->items, function($sum, $item){
            return $sum->add($item->getGross());
        }, Money::EUR(0));
    }
}

<?php

namespace App\Entities;

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
     * @return float
     */
    public function getTotalNetAmount(): float {
        return array_reduce($this->items, function($sum, $item){
            return $sum += $item->getPrice();
        }, 0);
    }

    /**
     * This methode sums up the prices with taxes of all items
     *
     * @return float
     */
    public function getTotalGross(): float {
        return array_reduce($this->items, function($sum, $item){
            return $sum += $item->getGross();
        }, 0);
    }
}

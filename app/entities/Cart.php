<?php

namespace App\Entities;

class Cart {

    private $items = [];

    public function add(Product $orderItem) {
        array_push($this->items, $orderItem);
    }

    public function addMany(array $orderItems) {
        $this->items = array_merge($this->items, $orderItems);
    }

    public function getTotalNetAmount() {
        return array_reduce($this->items, function($sum, $item){
            return $sum += $item->getPrice();
        }, 0);
    }

    public function getTotalGross() {
        return array_reduce($this->items, function($sum, $item){
            return $sum += $item->getGross();
        }, 0);
    }
}

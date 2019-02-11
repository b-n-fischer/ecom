<?php

namespace App\Entities;

class Product {

    private $name;
    private $price;
    private $taxation;

    public function __construct(string $name,float $price,float $taxation) {
        $this->name = $name;
        $this->price = $price;
        $this->taxation = $taxation;
    }


    public function getName() {
        return $this->name;
    }

    public function getTaxation() {
        return $this->taxation;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getGross() {
        return $this->price * (1 + ($this->taxation / 100));
    }
}

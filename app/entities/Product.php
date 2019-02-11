<?php

namespace App\Entities;

class Product {

    private $name;
    private $price;
    private $taxation;

    /**
     * Constructor
     *
     * @param string $name
     * @param float $price
     * @param float $taxation
     */
    public function __construct(string $name,float $price,float $taxation) {
        $this->name = $name;
        $this->price = $price;
        $this->taxation = $taxation;
    }

    /**
     * Getter methode $name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
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
     * Getter methode $price
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * This methode returns the price with taxes
     * Maybe "Gross" is not the right name for "Brutto Betrag"
     *
     * @return float
     */
    public function getGross(): float {
        return $this->price * (1 + ($this->taxation / 100));
    }
}

<?php

namespace App\Models;

use Models\Book;
use Interfaces\Saleable;
use Interfaces\Shippable;

include_once 'app/Interfaces/Shippable.php';
include_once 'app/Interfaces/Saleable.php';

class PaperBook extends Book implements Saleable, Shippable {

    private float $price;
    
    public function __construct(string $ISBN, string $title, int $publishedYear, float $price)
    {
        parent::__construct($ISBN, $title, $publishedYear);
        $this->setPrice($price);
    }


    public function setPrice(float $price): void {
        if ($price <= 0) {
            throw new \Exception("Invalid Price.");
        }
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

}
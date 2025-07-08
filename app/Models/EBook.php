<?php 

namespace Models\EBook;

include_once 'app/Interfaces/Maillable.php';
include_once 'app/Interfaces/Saleable.php';

use Exception;
use Interfaces\Maillable;
use Interfaces\Saleable;
use Models\Book;



class EBook extends Book implements Maillable, Saleable {

    private float $price;

    public function __construct(string $ISBN, string $title, int $publishedYear, float $price)
    {
        parent::__construct($ISBN, $title, $publishedYear);
        $this->setPrice($price);        
    }


    public function setPrice(float $price): void {
        
        if ($price <= 0) {
            throw new Exception("Invalid Price.");
        }

        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

}
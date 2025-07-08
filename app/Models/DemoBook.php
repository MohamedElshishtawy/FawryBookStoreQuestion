<?php 

namespace Models\EBook;

use Exception;
use Interfaces\Maillable;
use Interfaces\Saleable;
use Models\Book;



class DemoBook extends Book {

    public function __construct(string $ISBN, string $title, int $publishedYear)
    {
        parent::__construct($ISBN, $title, $publishedYear);     
    }

}
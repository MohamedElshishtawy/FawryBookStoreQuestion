<?php 

use Models\Book;


class StoreItem {

    private Book $book;
    private int $quantity;

    public function __construct(Book $book, int $quantity) {
        $this->setBook($book);
        $this->setQuantity($quantity);
    
    }

    public function setBook(Book $book): void {
        $this->book = $book;
    }

    public function getBook(): Book {
        return $this->book;
    }

    public function setQuantity(int $quantity): void {
        if ($quantity < 0) {
            throw new InvalidArgumentException("Invalid quantity.");
        }
        $this->quantity = $quantity;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }
        
    

}
<?php

namespace App\Services;

use Exception;
use Models\Book;


class ShippingService
{
    private string $address;
    private Book $book;
    private int $quantity;

    public function __construct(Book $book, int $quantity, string $address)
    {
       $this->setBook($book);
        $this->setAddress($address);
        $this->setQuantity($quantity);
 
    }

    // setters and getters

    public function setAddress(string $address): void
    {
        if (empty($address)) {
            throw new Exception("Address cannot be empty.");
        }
        $this->address = $address;
    }


    public function getAddress(): string
    {
        return $this->address;
    }
    


    public function setBook(Book $book): void
    {
        $this->book = $book;
    }


    public function getBook(): Book
    {
        return $this->book;
    }

    public function setQuantity(int $quantity): void
    {
        if ($quantity < 0) {
            throw new Exception("Invalid quantity.");
        }
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

}
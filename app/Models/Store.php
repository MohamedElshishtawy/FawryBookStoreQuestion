<?php 


namespace Models;

include_once 'app/Services/EmailService.php';
include_once 'app/Services/ShippingService.php';

use Exception;
use StoreItem;
use Interfaces\Saleable;
use Interfaces\Maillable;
use Interfaces\Shippable;
use Services\EmailService;
use App\Services\ShippingService;

class Store {

    private array $items;



    public function __construct() {
        $this->items = [];
    }





    public function add(Book $book, int $quantity) {
        $item = new StoreItem($book, $quantity);
        $this->items[] = $item;
    }





    public function remove(string $ISBN): void
    {
        foreach ($this->items as $key => $item) {
            if ($item->getBook()->getISBN() === $ISBN) {
                unset($this->items[$key]);
                return;
            }
        }
        throw new Exception("Not Found Such Book");
    }



    public function outDatedBooks(int $years): array
    {
        $outdatedBooks = [];
        $currentYear = date("Y");

        foreach ($this->items as $item) {
            $book = $item->getBook();
            if ($currentYear - $book->getPublishedYear() > $years) {
                $outdatedBooks[] = $book;
            }
        }

        return $outdatedBooks;
    }




    public function removeOutDates(int $years): void
    {
        $outdaates = $this->outDatedBooks($years);
        foreach ($outdaates as $book) {
            $this->remove($book->getISBN());
        }
    }




    public function getItems(): array
    {
        return $this->items;        
    }



    public function buy(string $ISBN, int $quantity = 1, ?string $email = null, ?string $address = null): float
    {
        /**
         * This method allows the store manager:
         * - sell a book and help him to know the price
         * - send an email if the book is maillable 
         * - ship the book if it is shippable
         */
        foreach ($this->items as $item) {
            $book = $item->getBook();
            if ($book->getISBN() === $ISBN) {
                
                if (! $book instanceof Saleable) {
                    throw new Exception("The Book is not saleable.");
                }
                
                if ($item->getQuantity() < $quantity) {
                    throw new Exception("Not enough stock for the book only {$item->getQuantity()} available.");
                }

                if ($book instanceof Maillable) {
                    
                    if (!$email) {
                        throw new Exception("Email is required.");
                    }

                    new EmailService($book, $email, $quantity);
                }

                if ($book instanceof Shippable) {
                    if (!$address) {
                        throw new Exception("Address is required ");
                    }
                    new ShippingService($book, $quantity, $address);
                }
                    

                $item->setQuantity($item->getQuantity() - $quantity);

                return $item->getBook()->getPrice() * $quantity;
            }
        }
        throw new Exception("Book with ISBN: $ISBN not found in store.");
    }


    public function gift(string $ISBN, int $quantity): void
    {
        /**
         * This method allows the store manager to gift a book
         */
        
         if ($quantity <= 0) {
            throw new Exception("Invalid quantity for gifting.");
        }
        
        foreach ($this->items as $item) {
            $book = $item->getBook();
            if ($book->getISBN() === $ISBN) {

                if ($book instanceof Saleable) {
                    throw new Exception("The Book is not a gift");
                }

                if ($item->getQuantity() < $quantity) {
                    throw new Exception("Not enough stock for the book only {$item->getQuantity()} available.");
                }


                $item->setQuantity($item->getQuantity() - $quantity);
                return;
            }
        }
        throw new Exception("The Book not found in store.");
    }

    

}
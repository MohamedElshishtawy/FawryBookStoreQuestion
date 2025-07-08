<?php

namespace Services;

use Models\Book;

class EmailService
{
    private string $email;
    private Book $book;
    private const string MAILER = 'fawry@g.com';


    public function __construct(Book $book, string $email)
    {
        $this->setBook($book);
        $this->setEmail($email);
    }


    // setters and getters
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setBook(Book $book): void
    {
        $this->book = $book;
    }

    public function getBook(): Book
    {
        return $this->book;
    }


}
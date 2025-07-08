<?php


namespace Models;

abstract class Book {

    private string $ISBN;
    private string $title;
    private int $publishedYear;

    public function __construct(string $ISBN, string $title, int $publishedYear) {
        $this->setISBN($ISBN);
        $this->setTitle($title);
        $this->setPublishedYear($publishedYear);
    }

    // setters and getters
    public function setISBN(string $ISBN): void {
        $this->ISBN = $ISBN;
    }

    public function getISBN(): string {
        return $this->ISBN;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setPublishedYear(int $publishedYear): void {
        $this->publishedYear = $publishedYear;
    }

    public function getPublishedYear(): string {
        return $this->publishedYear;
    }
    


}

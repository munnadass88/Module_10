<?php

// Define the Book class
class Book {
    // Private properties
    private $title;
    private $availableCopies;

    // Constructor to initialize properties
    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    // Method to get the title of the book
    public function getTitle() {
        return $this->title;
    }

    // Method to get the available copies of the book
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Method to borrow a book
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        }
        return false;
    }

    // Method to return a book
    public function returnBook() {
        $this->availableCopies++;
    }
}

// Define the Member class
class Member {
    // Private property
    private $name;

    // Constructor to initialize properties
    public function __construct($name) {
        $this->name = $name;
    }

    // Method to get the name of the member
    public function getName() {
        return $this->name;
    }

    // Method for a member to borrow a book
    public function borrowBook(Book $book) {
        if ($book->borrowBook()) {
            echo $this->name . " successfully borrowed '" . $book->getTitle() . "'.\n";
        } else {
            echo "No copies available for '" . $book->getTitle() . "'.\n";
        }
    }

    // Method for a member to return a book
    public function returnBook(Book $book) {
        $book->returnBook();
        echo $this->name . " successfully returned '" . $book->getTitle() . "'.\n";
    }
}

// Usage

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Members borrow books
$member1->borrowBook($book1); // John Doe borrows "The Great Gatsby"
$member2->borrowBook($book2); // Jane Smith borrows "To Kill a Mockingbird"

// Display available copies of each book
echo "Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . "\n";
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . "\n";

?>

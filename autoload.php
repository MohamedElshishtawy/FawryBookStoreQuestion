<?php

// display Exceptions and errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'app/Test.php';
include_once 'app/Models/Store.php';
include_once 'app/Models/StoreItem.php';
include_once 'app/Models/Book.php';
include_once 'app/Models/EBook.php';
include_once 'app/Models/PaperBook.php';
include_once 'app/Models/DemoBook.php';




// interfaces 
include_once 'app/Interfaces/Maillable.php';
include_once 'app/Interfaces/Saleable.php';
include_once 'app/Interfaces/Shippable.php';

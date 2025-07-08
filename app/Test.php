<?php 


namespace App;

use App\Models\PaperBook;
use Models\EBook\DemoBook;
use Models\EBook\EBook;
use Models\Store;

class Test {

    public Store $store;

    public function __construct() {
        $this->store = new Store();
    }
        

    public function run() {
        $ebook = new EBook("110", "Fawry Echo System", 2022, 100.0);
        $paperBook = new PaperBook("111", "Fawry Intern", 2025, 50.0);
        $gift = new DemoBook("112", "Fawry Gift", 2022);
    
        
        $this->store->add($ebook, 5);
        $this->store->add($paperBook, 10);
        $this->store->add($gift, 15);


        $this->store->buy('110', 2, 'cairo@g.com');
        $this->store->buy('111', 3, null, 'Fowa');
        $this->store->gift('112', 3);

        echo "<pre>";
        print_r($this->store->getItems());
        echo "</pre>";

        $this->store->removeOutDates(2);

        echo "<hr>";
        echo "After removing outdates items (less than 2 years old):<br>";

        echo "<pre>";
        print_r($this->store->getItems());
        echo "</pre>";
    }

}
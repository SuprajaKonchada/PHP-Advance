<?php


class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

// Usage
$product = new Product("Laptop", 1000);
echo $product->name; // Outputs: Laptop
?>

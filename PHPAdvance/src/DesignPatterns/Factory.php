<?php

class ProductFactory {
    public static function create($type) {
        switch ($type) {
            case 'Laptop':
                return new Laptop();
            case 'Phone':
                return new Phone();
            default:
                throw new Exception("Invalid product type");
        }
    }
}

class Laptop {
    public function __construct() {
        echo "Laptop created";
        echo '<br/>';
    }
}

class Phone {
    public function __construct() {
        echo "Phone created";
        echo '<br/>';
    }
}

// Usage
try {
    $product = ProductFactory::create('Laptop'); // Outputs: Laptop created
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

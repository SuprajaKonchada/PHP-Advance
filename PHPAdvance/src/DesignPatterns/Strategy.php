<?php

interface PaymentStrategy {
    public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid $amount using Credit Card";
        echo '<br/>';
    }
}

class PayPalPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid $amount using PayPal";
        echo '<br/>';
    }
}

class ShoppingCart {
    private $strategy;

    public function __construct(PaymentStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function checkout($amount) {
        $this->strategy->pay($amount);
    }
}

// Usage
$cart = new ShoppingCart(new PayPalPayment());
$cart->checkout(100); // Outputs: Paid 100 using PayPal
?>

<?php
interface Pizza {
    public function getDescription(): string;
    public function getPrice(): float;
}

class Margherita implements Pizza {
    public function getDescription(): string {
        return "Margherita Pizza";
    }

    public function getPrice(): float {
        return 5.99;
    }
}

abstract class PizzaDecorator implements Pizza {
    protected $pizza;

    public function __construct(Pizza $pizza) {
        $this->pizza = $pizza;
    }

    public function getDescription(): string {
        return $this->pizza->getDescription();
    }

    public function getPrice(): float {
        return $this->pizza->getPrice();
    }
}

class Cheese extends PizzaDecorator {
    public function getDescription(): string {
        return $this->pizza->getDescription() . ", extra cheese";
    }

    public function getPrice(): float {
        return $this->pizza->getPrice() + 1.00;
    }
}

class Mushrooms extends PizzaDecorator {
    public function getDescription(): string {
        return $this->pizza->getDescription() . ", mushrooms";
    }

    public function getPrice(): float {
        return $this->pizza->getPrice() + 0.50;
    }
}

$pizza = new Margherita();
echo $pizza->getDescription() . ": $" . $pizza->getPrice(); // Output: Margherita Pizza: $5.99
echo '<br>';

$pizza = new Cheese(new Margherita());
echo $pizza->getDescription() . ": $" . $pizza->getPrice(); // Output: Margherita Pizza, extra cheese: $6.99
echo '<br>';

$pizza = new Mushrooms(new Cheese(new Margherita()));
echo $pizza->getDescription() . ": $" . $pizza->getPrice(); // Output: Margherita Pizza, extra cheese, mushrooms: $7.49
echo '<br>';
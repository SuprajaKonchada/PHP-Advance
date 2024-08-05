<?php

class User {
    private $data = [];

    // Magic method to set a property
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    // Magic method to get a property
    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    // Magic method to check if a property is set
    public function __isset($name) {
        return isset($this->data[$name]);
    }

    // Magic method to unset a property
    public function __unset($name) {
        unset($this->data[$name]);
    }

    // Magic method to convert the object to a string
    public function __toString() {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

    // Magic method to handle calls to undefined methods
    public function __call($name, $arguments) {
        echo "Calling method '$name' with arguments: " . implode(', ', $arguments);
        echo '<br/>';
    }

    // Magic method to handle calls to undefined static methods
    public static function __callStatic($name, $arguments) {
        echo "Calling static method '$name' with arguments: " . implode(', ', $arguments);
        echo '<br/>';
    }

    // Magic method to handle object cloning
    public function __clone() {
        // Perform any actions required during object cloning
        echo "Cloning object...";
        echo '<br/>';
    }

    // Magic method to handle serialization
    public function __sleep() {
        // Serialize the $data array as a single property
        return ['data'];
    }

    // Magic method to handle unserialization
    public function __wakeup() {
        // Perform any actions required during unserialization
        echo "Unserializing object...";
        echo '<br/>';
    }
}

// Usage
$user = new User();
$user->name = "John Doe";
$user->email = "john.doe@example.com";

echo "<h2>User Object:</h2>";
echo "<pre>" . $user . "</pre>"; // Outputs: {"name":"John Doe","email":"john.doe@example.com"}

// Call an undefined method
echo "<h2>Undefined Method Call:</h2>";
$user->undefinedMethod('arg1', 'arg2');

// Call an undefined static method
echo "<h2>Undefined Static Method Call:</h2>";
User::undefinedStaticMethod('arg1', 'arg2');

// Clone the object
echo "<h2>Object Cloning:</h2>";
$clonedUser = clone $user;

// Serialize and unserialize the object
echo "<h2>Serialization:</h2>";
$serializedUser = serialize($user);
echo "<pre>Serialized User: $serializedUser</pre>";

echo "<h2>Unserialization:</h2>";
$unserializedUser = unserialize($serializedUser);
echo "<pre>" . $unserializedUser . "</pre>"; // Outputs the unserialized user data

?>

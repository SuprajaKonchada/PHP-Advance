<?php

class Database {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect() {
        echo "Connected to the database";
        echo '<br/>';
    }
}

// Usage
$db = Database::getInstance();
$db->connect(); // Outputs: Connected to the database
?>

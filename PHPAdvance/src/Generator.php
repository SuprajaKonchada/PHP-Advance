<?php


function getNumbers() {
    for ($i = 0; $i < 5; $i++) {
        yield $i;
    }
}

// Usage
foreach (getNumbers() as $number) {
    echo $number; 
    echo '<br/>'; // Outputs: 0 1 2 3 4
}
?>

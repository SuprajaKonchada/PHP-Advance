<?php

function customErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "Error: [$errno] $errstr - $errfile:$errline";
    echo '<br/>';
}

set_error_handler("customErrorHandler");

try {
    echo 10 / 0;
} catch (DivisionByZeroError $e) {
    echo "Caught exception: ",  $e->getMessage();
}
?>

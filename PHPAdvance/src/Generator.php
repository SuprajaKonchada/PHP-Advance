<?php

require 'Generators/NumberGenerator.php';
require 'Output/NumberPrinter.php';

use Output\NumberPrinter;

$printer = new NumberPrinter();
$printer->printNumbers();

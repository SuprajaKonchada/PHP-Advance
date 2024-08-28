<?php

namespace Output;

use Generators\NumberGenerator;

class NumberPrinter
{
    public function printNumbers()
    {
        $generator = new NumberGenerator();

        foreach ($generator->getNumbers() as $number) {
            echo $number;
            echo '<br/>'; // Outputs: 0 1 2 3 4
        }
    }
}

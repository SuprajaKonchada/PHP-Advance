<?php

namespace Generators;

class NumberGenerator
{
    public function getNumbers()
    {
        for ($i = 0; $i < 5; $i++) {
            yield $i;
        }
    }
}

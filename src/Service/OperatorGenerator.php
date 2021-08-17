<?php

declare(strict_types=1);

namespace App\Service;

class OperatorGenerator
{
    public function operator()
    {
        //random operator genereren
        $operator = array("*", "/", "+", "-");
        $rand = array_rand($operator, 1);

        return $operator[$rand];
    }
}
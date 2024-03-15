<?php

namespace src\FizzBuzz;

class FizzBuzz
{
    public static function parse(int $input): string {
        if ($input % 3 === 0) {
            return "Fizz";
        } elseif ($input % 5 === 0) {
            return "Buzz";
        }
        return strval($input);
    }
}
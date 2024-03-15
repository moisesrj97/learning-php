<?php

namespace src\FizzBuzz;

class FizzBuzz
{
    public static function parse(int $input): string
    {
        $divisibleBy3 = $input % 3 === 0;
        $divisibleBy5 = $input % 5 === 0;

        if ($divisibleBy5 && $divisibleBy3) {
            return "FizzBuzz";
        } elseif ($divisibleBy3) {
            return "Fizz";
        } elseif ($divisibleBy5) {
            return "Buzz";
        }
        return strval($input);
    }
}
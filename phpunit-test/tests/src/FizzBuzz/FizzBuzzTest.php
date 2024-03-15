<?php

namespace src\FizzBuzz;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testShouldReturnFizzIfPassed3(): void
    {
        $input = 3;
        $expectedResult = "Fizz";

        $result = FizzBuzz::parse($input);

        $this->assertEquals($result, $expectedResult);
    }

    public function testShouldReturn1IfPassed1(): void
    {
        $input = 1;
        $expectedResult = "1";

        $result = FizzBuzz::parse($input);

        $this->assertEquals($result, $expectedResult);
    }

    public function testShouldReturnBuzzIfPassed5(): void
    {
        $input = 5;
        $expectedResult = "Buzz";

        $result = FizzBuzz::parse($input);

        $this->assertEquals($result, $expectedResult);
    }
}

<?php

namespace src\FizzBuzz;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @dataProvider testCasesForFizzBuzz
     */
    public function testShouldParseInput(int $input, string $output): void
    {
        $input = 3;
        $expectedResult = "Fizz";

        $result = FizzBuzz::parse($input);

        $this->assertEquals($result, $expectedResult);
    }

    private function testCasesForFizzBuzz(): array {
        return array(
            array(3, "Fizz"),
            array(5, "Buzz"),
            array(15, "FizzBuzz"),
            array(1, "1")
        );
    }
}

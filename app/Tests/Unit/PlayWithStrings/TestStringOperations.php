<?php

namespace Tests\Unit\PlayWithStrings;


use PHPUnit\Framework\TestCase;
use Utils\StringOperations;

final class TestStringOperations extends TestCase
{
    protected function setUp(): void
    {
    }

    /**
     *
     * @dataProvider dataProvider
     */
    public function testGetNumberOfCharInText($text, $expected)
    {

        $result = StringOperations::countHowManyCharInText($text, '*');

        $this->assertEquals($expected, $result);
    }

    /**
     *
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            'uper string' => ['INTERVIEW', ['I' => '**', 'N' => '*', 'T' => '*', 'E' => '**', 'R' => '*', 'V' => '*', 'W' => '*']],
            'spaces'      => ['INTERVIEW ', ['I' => '**', 'N' => '*', 'T' => '*', 'E' => '**', 'R' => '*', 'V' => '*', 'W' => '*', ' ' => '*']],
            'lower cases' => ['io io ', ['i' => '**', 'o' => '**', ' ' => '**']],
        ];
    }

    protected function tearDown(): void
    {
    }
}

<?php

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @dataProvider emailsProvider
     * @param string $email
     */
    public function testValidEmail(string $email)
    {
        $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $email);
    }

    public function emailsProvider()
    {
        return [
            ['fefef@fef.com'],
            ['wdw@fef.fe'],
            ['feawdwdfef@fef.wdw'],
        ];
    }

    /**
     * @dataProvider numbersProvider
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testMath($a, $b, $expected)
    {
        $result = $a * $b;
        $this->assertEquals($expected, $result);
    }

    public function numbersProvider(): array
    {
        return [
            [1, 2, 2],
            [2, 2, 4],
            [3, 3, 9],
        ];
    }
}

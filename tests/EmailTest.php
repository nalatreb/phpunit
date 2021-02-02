<?php

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @dataProvider emailsProvider
     * @param string $email
     */
    public function testValidEmail(string $email): void
    {
        $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $email);
    }

    public function emailsProvider(): array
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
    public function testMath($a, $b, $expected): void
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

<?php

use PHPUnit\Framework\TestCase;

class DependenciesTest extends TestCase
{
    private int $value = 0;

    public function testFirstTest(): int
    {
        $this->value = 1;
        $this->assertEquals(1, $this->value);

        return $this->value;
    }

    /**
     * @depends testFirstTest
     * @param int $value
     * @return int
     */
    public function testDependency1(int $value): int
    {
        $value++;
        $expected = 2;
        $result = $value;
        $this->assertEquals($expected, $result);
        return $value;
    }

    /**
     * @depends testDependency1
     * @param $value
     */
    public function testDependency2(int $value): void
    {
        $value++;
        $expected = 3;
        $result = $value;
        $this->assertEquals($expected, $result);
    }
}

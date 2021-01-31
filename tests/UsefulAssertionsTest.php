<?php

use PHPUnit\Framework\TestCase;

class UsefulAssertionsTest extends TestCase
{
    public function testAssertSame()
    {
        $expected = 'baz';
        $result = 'baz';

        $this->assertSame($expected, $result);
    }

    public function testAssertEquals()
    {
        $expected = 1;
        $result = 1;

        $this->assertEquals($expected, $result);
    }

    public function testAssertEmpty()
    {
        $this->assertEmpty([]);
    }

    public function testAssertNull()
    {
        $this->assertNull(null);
    }

    public function testAssertGreaterThan()
    {
        $expected = 2;
        $result = 3;

        $this->assertGreaterThan($expected, $result);
    }

    public function testAssertFalse()
    {
        $this->assertFalse(false);
    }

    public function testAssertTrue()
    {
        $this->assertTrue(true);
    }

    public function testAssertCount()
    {
        $this->assertCount(3, [1, 2, 3]);
    }

    public function testAssertContains()
    {
        $this->assertContains(4, [1, 2, 3, 4]);
    }

    public function testAssertStringContainsString()
    {
        $searchFor = 'foo';
        $searchIn = 'foo';

        $this->assertStringContainsString($searchFor, $searchIn);
    }

    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf(RuntimeException::class, new RuntimeException());
    }

    public function testAssertArrayHayKey()
    {
        $this->assertArrayHasKey('baz', ['baz' => 'bar']);
    }

    public function testAssertDirectoryIsWritable()
    {
        $this->assertDirectoryIsWritable('./');
    }

    public function testAssertFileIsWritable()
    {
        $this->assertFileIsWritable('./.env');
    }
}

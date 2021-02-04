<?php

use PHPUnit\Framework\TestCase;

class UsefulAssertionsTest extends TestCase
{
    public function testAssertSame(): void
    {
        $expected = 'baz';
        $result = 'baz';

        $this->assertSame($expected, $result);
    }

    public function testAssertEquals(): void
    {
        $expected = 1;
        $result = 1;

        $this->assertEquals($expected, $result);
    }

    public function testAssertEmpty(): void
    {
        $this->assertEmpty([]);
    }

    public function testAssertNull(): void
    {
        $this->assertNull(null);
    }

    public function testAssertGreaterThan(): void
    {
        $expected = 2;
        $result = 3;

        $this->assertGreaterThan($expected, $result);
    }

    public function testAssertFalse(): void
    {
        $this->assertFalse(false);
    }

    public function testAssertTrue(): void
    {
        $this->assertTrue(true);
    }

    public function testAssertCount(): void
    {
        $this->assertCount(3, [1, 2, 3]);
    }

    public function testAssertContains(): void
    {
        $this->assertContains(4, [1, 2, 3, 4]);
    }

    public function testAssertStringContainsString(): void
    {
        $searchFor = 'foo';
        $searchIn = 'foo';

        $this->assertStringContainsString($searchFor, $searchIn);
    }

    public function testAssertInstanceOf(): void
    {
        $this->assertInstanceOf(RuntimeException::class, new RuntimeException());
    }

    public function testAssertArrayHayKey(): void
    {
        $this->assertArrayHasKey('baz', ['baz' => 'bar']);
    }

    public function testAssertDirectoryIsWritable(): void
    {
        $this->assertDirectoryIsWritable('./');
    }

    public function testAssertFileIsWritable(): void
    {
        $this->assertFileIsWritable('.gitignore');
    }
}

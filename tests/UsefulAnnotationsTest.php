<?php


class UsefulAnnotationsTest extends \PHPUnit\Framework\TestCase
{
    private int $value = 0;

    /**
     * @before
     */
    public function runBeforeEachTestMethod(): void
    {
        $this->value = 1;
    }

    /**
     * @after
     */
    public function runAfterEachTestMethod(): void
    {
        $this->value = 0;
    }

    public function testAnnotations1(): void
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($expected, $result);
    }

    public function testAnnotations2(): void
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($expected, $result);
    }
}

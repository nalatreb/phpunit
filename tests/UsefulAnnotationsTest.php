<?php


class UsefulAnnotationsTest extends \PHPUnit\Framework\TestCase
{
    private $value = 0;

    /**
     * @before
     */
    public function runBeforeEachTestMethod()
    {
        $this->value = 1;
    }

    /**
     * @after
     */
    public function runAfterEachTestMethod()
    {
        $this->value = 0;
    }

    public function testAnnotations1()
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($expected, $result);
    }

    public function testAnnotations2()
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($expected, $result);
    }
}

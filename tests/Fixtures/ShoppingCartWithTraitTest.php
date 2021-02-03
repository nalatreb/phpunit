<?php

namespace Fixtures;

use PHPUnit\Framework\TestCase;
use Traits\DatabaseTrait;
use Traits\ShoppingCartFixtureTrait;

class ShoppingCartWithTraitTest extends TestCase
{
    use DatabaseTrait;
    use ShoppingCartFixtureTrait;

    public function testCorrectNumberOfItems()
    {
        $this->cart->addItem('one');
        $expected = 1;
        $result = $this->cart->amount;
        $this->assertEquals($expected, $result);
    }

    public function testCorrectProductName()
    {
        $this->cart->addItem('Apple');
        $this->assertContains('Apple', $this->cart->cartItems);
    }
}

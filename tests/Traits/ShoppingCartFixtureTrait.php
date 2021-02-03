<?php

namespace Traits;

use App\ShoppingCart;

trait ShoppingCartFixtureTrait
{
    protected ShoppingCart $cart;

    protected function setUp(): void
    {
        $this->cart = new ShoppingCart();
    }

    protected function tearDown(): void
    {
        unset($this->cart);
    }
}
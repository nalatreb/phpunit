<?php

namespace App;

class ShoppingCart
{
    public array $cartItems = [];
    public int $amount = 0;

    public function addItem($item)
    {
        $this->cartItems[] = $item;
        $this->amount++;
    }
}

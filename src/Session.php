<?php

namespace App;

class Session implements SessionInterface
{
    public function open(): void
    {
        echo 'real opening the session';
    }

    public function close(): void
    {
        echo 'real closing the session';
    }

    public function write($product): void
    {
        echo 'real writing to the session ' . $product;
    }
}
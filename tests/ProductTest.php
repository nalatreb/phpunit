<?php

use App\Product;
use App\SessionInterface;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProduct(): void
    {
//        $product = new Product(new Session());
        $session = new class implements SessionInterface {
            public function open() {}
            public function close() {}
            public function write($product)
            {
                echo 'mocked writing to the session ' . $product;
            }
        };
        $product = new Product($session);
        $product->setLoggerCallable(function () {
            echo 'real logger was not called!';
        });
        $this->assertSame('product 1', $product->fetchProductById(1));
    }
}

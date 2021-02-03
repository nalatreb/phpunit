<?php

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testValidUserName(): void
    {
        $user = new User('donald', 'Trump');
        $expected = 'Donald';
        $phpunit = $this;
        $closure = function () use ($phpunit, $expected) {
            $phpunit->assertSame($expected, $this->name);
        };
        $binding = $closure->bindTo($user, get_class($user));
        $binding();
    }

    public function testValidUserName2(): void
    {
        $user = new class('donald', 'Trump') extends User {
            public function getName(): string
            {
                return $this->name;
            }
        };
        $this->assertSame('Donald', $user->getName());
    }
}

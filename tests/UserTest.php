<?php

use App\Database;
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
            $property = 'name';
            $phpunit->assertSame($expected, $this->$property);
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

    public function testValidDataFormat(): void
    {
        $user = new User('donald', 'Trump');
        $mockedDb = new class extends Database {
            public function getEmailAndLastName(): void
            {
//                echo 'no real db touched!';
            }
        };
        $setUserClosure = function () use ($mockedDb) {
            $property = 'db';
            $this->$property = $mockedDb;
        };
        $executeSetUserClosure = $setUserClosure->bindTo($user, get_class($user));
        $executeSetUserClosure();
        $this->assertSame('Donald Trump', $user->getFullName());
    }
}

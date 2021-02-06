<?php

use App\Database;
use App\User;
use PHPUnit\Framework\TestCase;
use Traits\CustomAssertionTrait;

class UserTest extends TestCase
{
    use CustomAssertionTrait;

    private User $user;

    public function setUp(): void
    {
        $this->user = new User('donald', 'Trump');
    }

    public function testValidUserName(): void
    {
        $expected = 'Donald';
        $phpunit = $this;
        $closure = function () use ($phpunit, $expected) {
            $property = 'name';
            $phpunit->assertSame($expected, $this->$property);
        };
        $binding = $closure->bindTo($this->user, get_class($this->user));
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
        $mockedDb = new class extends Database {
            public function getEmailAndLastName(): void
            {
                echo 'no real db touched!';
            }
        };
        $setUserClosure = function () use ($mockedDb) {
            $property = 'db';
            $this->$property = $mockedDb;
        };
        $executeSetUserClosure = $setUserClosure->bindTo($this->user, get_class($this->user));
        $executeSetUserClosure();
        $this->assertSame('Donald Trump', $this->user->getFullName());
    }

    public function testPasswordHashed(): void
    {
        $expected = 'password hashed!';
        $phpunit = $this;
        $assertClosure = function () use ($phpunit, $expected) {
            $method = 'hashPassword';
            $phpunit->assertSame($expected, $this->$method());
        };
        $executeAssertClosure = $assertClosure->bindTo($this->user, get_class($this->user));
        $executeAssertClosure();
    }

    public function testPasswordHashed2(): void
    {
        $user = new class('donald', 'Trump') extends User {
            public function getHashedPassword(): string
            {
                return $this->hashPassword();
            }
        };
        $this->assertSame('password hashed!', $user->getHashedPassword());
    }

    public function testCustomDataStructure(): void
    {
        $data = [
            'nick' => 'Dolar',
            'email' => 'donald@trump.com',
            'age' => 70
        ];
        $this->assertArrayData($data);
    }

    public function testSomeOperation()
    {
        $this->assertEquals('error', $this->user->someOperation([]));
        $this->assertEquals('error', $this->user->someOperation([0]));
    }

    public function testSomeOperation2()
    {
        $this->assertEquals('ok!', $this->user->someOperation([1, 2, 3]));
        $this->assertEquals('ok!', $this->user->someOperation([1]));
    }
}

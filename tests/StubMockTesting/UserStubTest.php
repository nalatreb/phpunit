<?php

namespace StubMockTesting;

use App\ForStubMockTesting\User;
use PHPUnit\Framework\TestCase;

class UserStubTest extends TestCase
{
    public function testCreateUser()
    {
//        $userMock = $this->getMockBuilder(User::class)
//            ->getMock();
//        $userMock = $this->createStub(User::class);
//        $userMock->method('save')
//            ->willReturn(true);
//        $userMock = $this->getMockBuilder(User::class)
//            ->onlyMethods([])
//            ->getMock();
        $userMock = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['save'])
            ->getMock();
        $userMock->method('save')
            ->willReturn(true);
        $this->assertTrue($userMock->createUser('Adam', 'adam@email.com'));
        $this->assertFalse($userMock->createUser('Adam', 'email'));
    }
}

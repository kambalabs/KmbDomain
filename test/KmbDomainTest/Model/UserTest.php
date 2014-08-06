<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\User;
use KmbDomain\Model\UserInterface;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canGetRoles()
    {
        $user = new User('jdoe', 'John DOE', 'jdoe@gmail.com', UserInterface::ROLE_ROOT);

        $this->assertEquals([UserInterface::ROLE_ROOT], $user->getRoles());
    }
}

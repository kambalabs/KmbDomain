<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Environment;
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

    /** @test */
    public function canAddEnvironment()
    {
        $user = new User();
        $user->setEnvironments([new Environment(), new Environment()]);

        $user->addEnvironment(new Environment());

        $this->assertEquals(3, count($user->getEnvironments()));
    }
}

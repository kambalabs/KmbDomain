<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Environment;
use KmbDomain\Model\User;

class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canGetNormalizedNameForRootEnvironment()
    {
        $root = $this->createEnvironment(1, 'STABLE');

        $this->assertEquals('STABLE', $root->getNormalizedName());
    }

    /** @test */
    public function canGetNormalizedNameForChildEnvironment()
    {
        $root = $this->createEnvironment(1, 'STABLE');
        $child = $this->createEnvironment(2, 'PF1');
        $child->setParent($root);

        $this->assertEquals('STABLE_PF1', $child->getNormalizedName());
    }

    /** @test */
    public function canGetNormalizedNameForGrandChildEnvironment()
    {
        $root = $this->createEnvironment(1, 'STABLE');
        $child = $this->createEnvironment(2, 'PF1');
        $child->setParent($root);
        $grandchild = $this->createEnvironment(3, 'PROD');
        $grandchild->setParent($child);

        $this->assertEquals('STABLE_PF1_PROD', $grandchild->getNormalizedName());
    }

    /** @test */
    public function canCheckIfIsNotAncestorOf()
    {
        $environment1 = $this->createEnvironment(1, 'PF1');
        $environment2 = $this->createEnvironment(2, 'PF2');

        $this->assertFalse($environment1->isAncestorOf($environment2));
    }

    /** @test */
    public function canCheckIfIsAncestorOf()
    {
        $root = $this->createEnvironment(1, 'STABLE');
        $child = $this->createEnvironment(2, 'PF1');
        $child->setParent($root);
        $grandchild = $this->createEnvironment(3, 'PROD');
        $grandchild->setParent($child);

        $this->assertTrue($root->isAncestorOf($grandchild));
    }

    /** @test */
    public function canCheckIfIsNotAncestorOfNull()
    {
        $environment = $this->createEnvironment(1, 'PF1');

        $this->assertFalse($environment->isAncestorOf(null));
    }

    /** @test */
    public function canCheckIfHasNotChildWithName()
    {
        $environment = $this->createEnvironment(1, 'PF1');

        $this->assertFalse($environment->hasChildWithName('ITG'));
    }

    /** @test */
    public function canCheckIfHasChildWithName()
    {
        $environment = $this->createEnvironment(1, 'PF1');
        $child = $this->createEnvironment(2, 'ITG');
        $environment->addChild($child);

        $this->assertTrue($environment->hasChildWithName('ITG'));
    }

    /** @test */
    public function canAddUsers()
    {
        $environment = $this->createEnvironment(1, 'PF1');
        $environment->setUsers([
            (new User('jdoe'))->setId(1),
            (new User('jmiller'))->setId(2)
        ]);

        $environment->addUsers([
            (new User('jmiller'))->setId(2),
            (new User('psmith'))->setId(3),
            (new User('mcooper'))->setId(4)
        ]);

        $users = $environment->getUsers();
        $this->assertEquals(4, count($users));
        $this->assertEquals('psmith', $users[2]->getLogin());
    }

    /** @test */
    public function canRemoveUserById()
    {
        $user = new User('jmiller');
        $user->setId(2);
        $environment = $this->createEnvironment(1, 'PF1');
        $environment->setUsers([new User('jdoe'), $user]);

        $environment->removeUserById(2);

        $this->assertEquals(1, count($environment->getUsers()));
    }

    /** @test */
    public function canCheckIfNotHasUsers()
    {
        $environment = $this->createEnvironment(1, 'PF1');

        $this->assertFalse($environment->hasUsers());
    }

    /** @test */
    public function canCheckIfHasUsers()
    {
        $environment = $this->createEnvironment(1, 'PF1');
        $environment->setUsers([new User('jdoe'), new User('jmiller')]);

        $this->assertTrue($environment->hasUsers());
    }

    /** @test */
    public function canCheckIfNotHasUser()
    {
        $environment = $this->createEnvironment(1, 'PF1');

        $this->assertFalse($environment->hasUser(new User('jdoe')));
    }

    /** @test */
    public function canCheckIfHasUser()
    {
        $user = new User('jmiller');
        $user->setId(2);
        $environment = $this->createEnvironment(1, 'PF1');
        $environment->setUsers([new User('jdoe'), $user]);

        $this->assertTrue($environment->hasUser($user));
    }

    /**
     * @param $id
     * @param $name
     * @return Environment
     */
    protected function createEnvironment($id = null, $name = null)
    {
        $environment = new Environment();
        return $environment->setId($id)->setName($name);
    }
}

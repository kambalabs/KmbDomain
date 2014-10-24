<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Group;
use KmbDomain\Model\GroupClass;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canAddClass()
    {
        $group = new Group();

        $group->addClass(new GroupClass());

        $this->assertEquals([new GroupClass()], $group->getClasses());
    }

    /** @test */
    public function cannotGetClassByUnknownName()
    {
        $group = new Group();

        $this->assertNull($group->getClassByName('unknown'));
    }

    /** @test */
    public function canGetClassByName()
    {
        $class = new GroupClass();
        $class->setName('dns');
        $group = new Group();
        $group->setClasses([new GroupClass(), $class, new GroupClass()]);

        $this->assertEquals($class, $group->getClassByName('dns'));
    }

    /** @test */
    public function canCheckIfHasNotClassWithName()
    {
        $group = new Group();

        $this->assertFalse($group->hasClassWithName('unknown'));
    }

    /** @test */
    public function canCheckIfHasClassWithName()
    {
        $class = new GroupClass();
        $class->setName('dns');
        $group = new Group();
        $group->setClasses([new GroupClass(), $class, new GroupClass()]);

        $this->assertTrue($group->hasClassWithName('dns'));
    }
}

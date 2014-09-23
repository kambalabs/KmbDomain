<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Group;
use KmbDomain\Model\PuppetClass;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canAddClass()
    {
        $group = new Group();

        $group->addClass(new PuppetClass());

        $this->assertEquals([new PuppetClass()], $group->getClasses());
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
        $class = new PuppetClass();
        $class->setName('dns');
        $group = new Group();
        $group->setClasses([new PuppetClass(), $class, new PuppetClass()]);

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
        $class = new PuppetClass();
        $class->setName('dns');
        $group = new Group();
        $group->setClasses([new PuppetClass(), $class, new PuppetClass()]);

        $this->assertTrue($group->hasClassWithName('dns'));
    }
}

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

    /** @test */
    public function canMatchWithHostname()
    {
        $group = new Group('web');
        $group->setIncludePattern('.*.local');
        $group->setExcludePattern('node2');

        $this->assertTrue($group->matchesForHostname('node1.local'));
    }

    /** @test */
    public function cannotMatchWithHostname()
    {
        $group = new Group('web');
        $group->setIncludePattern('.*.local');
        $group->setExcludePattern('node2');

        $this->assertFalse($group->matchesForHostname('node2.local'));
    }

    /** @test */
    public function canClone()
    {
        $class = new GroupClass('apache::vhost');
        $class->setId(1);
        $group = new Group('web');
        $group->setId(1);
        $group->setClasses([$class]);

        $newGroup = clone $group;

        $this->assertNull($newGroup->getId());
        $this->assertEquals([new GroupClass('apache::vhost')], $newGroup->getClasses());
        $this->assertNull($newGroup->getOrdering());
        $this->assertNull($newGroup->getEnvironment());
        $this->assertNull($newGroup->getRevision());
    }

    /** @test */
    public function canDumpEmptyGroup()
    {
        $group = new Group('empty');

        $this->assertEquals([], $group->dump());
    }

    /** @test */
    public function canDump()
    {
        $group = new Group('web');
        $group->setClasses([new GroupClass('apache::vhost'), new GroupClass('dns')]);

        $this->assertEquals(['apache::vhost' => [], 'dns' => []], $group->dump());
    }

    /** @test */
    public function canExtract()
    {
        $group = new Group('web', '.*', 'test');
        $group->setClasses([new GroupClass('apache::vhost'), new GroupClass('dns')]);

        $this->assertEquals([
            'name' => 'web',
            'ordering' => 0,
            'type' => 'default',
            'include_pattern' => '.*',
            'exclude_pattern' => 'test',
            'classes' => [
                'apache::vhost' => [],
                'dns' => []
            ]
        ], $group->extract());
    }

    /** @test */
    public function canCheckIfCustomGroup()
    {
        $group = new Group('web', '.*', 'test');

        $this->assertFalse($group->isCustom());

        $group->setType('haproxy');

        $this->assertTrue($group->isCustom());
    }
}

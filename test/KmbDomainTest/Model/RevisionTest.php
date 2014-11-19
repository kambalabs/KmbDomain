<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Group;
use KmbDomain\Model\Revision;

class RevisionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canGetGroupByName()
    {
        $group = new Group('web');
        $revision = new Revision();
        $revision->setGroups([new Group('default'), $group]);

        $this->assertEquals($group, $revision->getGroupByName('web'));
    }

    /** @test */
    public function cannotGetGroupByUnknownName()
    {
        $revision = new Revision();

        $this->assertNull($revision->getGroupByName('unknown'));
    }

    /** @test */
    public function canCheckIfHasGroupWithName()
    {
        $revision = new Revision();
        $revision->setGroups([new Group('default'), new Group('web')]);

        $this->assertTrue($revision->hasGroupWithName('web'));
    }

    /** @test */
    public function canCheckIfHasNotGroupWithName()
    {
        $revision = new Revision();

        $this->assertFalse($revision->hasGroupWithName('unknown'));
    }

    /** @test */
    public function cannotGetEmptyGroupsMatchingHostname()
    {
        $revision = new Revision();

        $this->assertEmpty($revision->getGroupsMatchingHostname('node1.local'));
    }

    /** @test */
    public function canGetGroupsMatchingHostname()
    {
        $group1 = $this->getMock('KmbDomain\Model\GroupInterface');
        $group1->expects($this->any())->method('matchesForHostname')->will($this->returnValue(true));
        $group2 = $this->getMock('KmbDomain\Model\GroupInterface');
        $group2->expects($this->any())->method('matchesForHostname')->will($this->returnValue(false));
        $group3 = $this->getMock('KmbDomain\Model\GroupInterface');
        $group3->expects($this->any())->method('matchesForHostname')->will($this->returnValue(true));
        $revision = new Revision();
        $revision->setGroups([$group1, $group2, $group3]);

        $this->assertEquals([$group1, $group3], $revision->getGroupsMatchingHostname('node1.local'));
    }

    /** @test */
    public function canClone()
    {
        $group = new Group('web');
        $group->setId(1);
        $revision = new Revision();
        $revision->setId(1);
        $revision->setGroups([$group]);

        $newRevision = clone $revision;

        $this->assertNull($newRevision->getId());
        $this->assertEquals([new Group('web')], $newRevision->getGroups());
        $this->assertNull($newRevision->getComment());
        $this->assertNull($newRevision->getReleasedAt());
        $this->assertNull($newRevision->getReleasedBy());
        $this->assertEmpty($newRevision->getLogs());
    }
}

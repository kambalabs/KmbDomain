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
        $this->assertNull($newRevision->getEnvironment());
        $this->assertNull($newRevision->getComment());
        $this->assertNull($newRevision->getReleasedAt());
        $this->assertNull($newRevision->getReleasedBy());
        $this->assertNull($newRevision->getUpdatedAt());
        $this->assertNull($newRevision->getUpdatedBy());
    }
}

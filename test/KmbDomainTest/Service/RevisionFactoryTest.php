<?php
namespace KmbDomainTest\Service;

use KmbDomain\Service\RevisionFactory;

class RevisionFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \KmbDomain\Service\RevisionFactory */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new RevisionFactory();
    }

    /** @test */
    public function canCreateFromArray()
    {
        $revision = $this->factory->createFromImportedData([
            'released_at' => '2014-11-14T18:50:57+01:00',
            'released_by' => 'John DOE',
            'comment' => 'Add new group',
            'groups' => [
                [
                    'name' => 'default',
                    'ordering' => 0,
                    'include_pattern' => '.*',
                    'exclude_pattern' => '',
                    'classes' => [
                        'nameserver' => ['ns1.local', 'ns2.local']
                    ],
                ],
            ]
        ]);

        $this->assertInstanceOf('KmbDomain\Model\Revision', $revision);
        $this->assertEquals(new \DateTime('2014-11-14T18:50:57+01:00'), $revision->getReleasedAt());
        $this->assertEquals('John DOE', $revision->getReleasedBy());
        $this->assertEquals('Add new group', $revision->getComment());
        $this->assertInstanceOf('KmbDomain\Model\Group', $revision->getGroupByName('default'));
    }
}

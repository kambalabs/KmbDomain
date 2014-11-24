<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\GroupClass;
use KmbDomain\Model\GroupFactory;
use KmbDomain\Model\GroupParameter;

class GroupFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  GroupFactory */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new GroupFactory();
    }

    /** @test */
    public function canCreateFromArray()
    {
        $group = $this->factory->createFromImportedData([
            'name' => 'default',
            'ordering' => 0,
            'include_pattern' => '.*',
            'exclude_pattern' => '',
            'classes' => [
                'dns' => [
                    'nameserver' => ['ns1.local', 'ns2.local'],
                ]
            ]
        ]);

        $this->assertInstanceOf('KmbDomain\Model\Group', $group);
        $this->assertEquals('default', $group->getName());
        $this->assertEquals('.*', $group->getIncludePattern());
        $this->assertEquals('', $group->getExcludePattern());
        $this->assertEquals(0, $group->getOrdering());
        $expectedGroupClass = new GroupClass('dns');
        $expectedGroupClass->setParameters([new GroupParameter('nameserver', ['ns1.local', 'ns2.local'])]);
        $this->assertEquals([$expectedGroupClass], $group->getClasses());
    }
}

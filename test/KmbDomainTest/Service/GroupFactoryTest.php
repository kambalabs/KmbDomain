<?php
namespace KmbDomainTest\Service;

use KmbDomain\Model\GroupClass;
use KmbDomain\Model\GroupParameter;
use KmbDomain\Service\GroupFactory;

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
            'type' => 'dns',
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
        $this->assertEquals('dns', $group->getType());
        $this->assertEquals('.*', $group->getIncludePattern());
        $this->assertEquals('', $group->getExcludePattern());
        $this->assertEquals(0, $group->getOrdering());
        $expectedGroupClass = new GroupClass('dns');
        $expectedGroupClass->setParameters([new GroupParameter('nameserver', ['ns1.local', 'ns2.local'])]);
        $this->assertEquals([$expectedGroupClass], $group->getClasses());
    }
}

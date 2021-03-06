<?php
namespace KmbDomainTest\Service;

use KmbDomain\Model\GroupParameter;
use KmbDomain\Service\GroupClassFactory;

class GroupClassFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  GroupClassFactory */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new GroupClassFactory();
    }

    /** @test */
    public function canCreateFromArray()
    {
        $groupClass = $this->factory->createFromImportedData('dns', ['nameserver' => ['ns1.local', 'ns2.local']]);

        $this->assertInstanceOf('KmbDomain\Model\GroupClass', $groupClass);
        $this->assertEquals('dns', $groupClass->getName());
        $this->assertEquals([new GroupParameter('nameserver', ['ns1.local', 'ns2.local'])], $groupClass->getParameters());
    }
}

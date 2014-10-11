<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Group;
use KmbDomain\Model\PuppetClassFactory;

class PuppetClassFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canCreate()
    {
        $factory = new PuppetClassFactory();

        $class = $factory->create('dns', new Group('default'));

        $this->assertInstanceOf('KmbDomain\Model\PuppetClass', $class);
        $this->assertEquals('default', $class->getGroup()->getName());
    }
}

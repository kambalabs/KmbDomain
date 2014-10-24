<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\GroupClass;
use KmbDomain\Model\GroupParameter;

class GroupClassTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canAddParameter()
    {
        $class = new GroupClass();

        $class->addParameter(new GroupParameter());

        $this->assertEquals([new GroupParameter()], $class->getParameters());
    }

    /** @test */
    public function cannotGetParameterByUnknownName()
    {
        $class = new GroupClass();

        $this->assertNull($class->getParameterByName('unknown'));
    }

    /** @test */
    public function canGetParameterByName()
    {
        $parameter = new GroupParameter();
        $parameter->setName('nameserver');
        $class = new GroupClass();
        $class->setParameters([new GroupParameter(), $parameter, new GroupParameter()]);

        $this->assertEquals($parameter, $class->getParameterByName('nameserver'));
    }

    /** @test */
    public function canCheckIfHasNotParameterWithName()
    {
        $class = new GroupClass();

        $this->assertFalse($class->hasParameterWithName('unknown'));
    }

    /** @test */
    public function canCheckIfHasParameterWithName()
    {
        $parameter = new GroupParameter();
        $parameter->setName('nameserver');
        $class = new GroupClass();
        $class->setParameters([new GroupParameter(), $parameter, new GroupParameter()]);

        $this->assertTrue($class->hasParameterWithName('nameserver'));
    }
}

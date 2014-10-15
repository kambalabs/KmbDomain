<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Parameter;
use KmbDomain\Model\ParameterType;
use KmbDomain\Model\PuppetClass;
use Zend\Json\Json;

class PuppetClassTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canAddParameter()
    {
        $class = new PuppetClass();

        $class->addParameter(new Parameter());

        $this->assertEquals([new Parameter()], $class->getParameters());
    }

    /** @test */
    public function cannotGetParameterByUnknownName()
    {
        $class = new PuppetClass();

        $this->assertNull($class->getParameterByName('unknown'));
    }

    /** @test */
    public function canGetParameterByName()
    {
        $parameter = new Parameter();
        $parameter->setName('nameserver');
        $class = new PuppetClass();
        $class->setParameters([new Parameter(), $parameter, new Parameter()]);

        $this->assertEquals($parameter, $class->getParameterByName('nameserver'));
    }

    /** @test */
    public function canCheckIfHasNotParameterWithName()
    {
        $class = new PuppetClass();

        $this->assertFalse($class->hasParameterWithName('unknown'));
    }

    /** @test */
    public function canCheckIfHasParameterWithName()
    {
        $parameter = new Parameter();
        $parameter->setName('nameserver');
        $class = new PuppetClass();
        $class->setParameters([new Parameter(), $parameter, new Parameter()]);

        $this->assertTrue($class->hasParameterWithName('nameserver'));
    }
}

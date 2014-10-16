<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Parameter;

class ParameterTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canAddChild()
    {
        $parameter = new Parameter();

        $parameter->addChild(new Parameter());

        $this->assertEquals([new Parameter()], $parameter->getChildren());
    }

    /** @test */
    public function cannotGetChildWithUnknownName()
    {
        $parameter = new Parameter();

        $this->assertNull($parameter->getChildByName('unknown'));
    }

    /** @test */
    public function canGetChildWithName()
    {
        $child = new Parameter();
        $child->setName('DocumentRoot');
        $parameter = new Parameter();
        $parameter->setChildren([new Parameter(), $child, new Parameter()]);

        $this->assertEquals($child, $parameter->getChildByName('DocumentRoot'));
    }

    /** @test */
    public function canAddValue()
    {
        $parameter = new Parameter();

        $parameter->addValue('test');

        $this->assertEquals(['test'], $parameter->getValues());
    }

    /** @test */
    public function canCheckIfHasValue()
    {
        $parameter = new Parameter();
        $parameter->setValues(['test', '/srv/http/node1.local', 'other']);

        $this->assertTrue($parameter->hasValue('/srv/http/node1.local'));
    }

    /** @test */
    public function canCheckIfHasNotValue()
    {
        $parameter = new Parameter();

        $this->assertFalse($parameter->hasValue('unknown'));
    }
}

<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Parameter;
use KmbDomain\Model\ParameterType;
use KmbDomain\Model\Value;
use Zend\Json\Json;

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

        $parameter->addValue(new Value());

        $this->assertEquals([new Value()], $parameter->getValues());
    }

    /** @test */
    public function cannotGetValueWithUnknownName()
    {
        $parameter = new Parameter();

        $this->assertNull($parameter->getValueByName('unknown'));
    }

    /** @test */
    public function canGetValueWithName()
    {
        $value = new Value();
        $value->setName('/srv/http/node1.local');
        $parameter = new Parameter();
        $parameter->setValues([new Value(), $value, new Value()]);

        $this->assertEquals($value, $parameter->getValueByName('/srv/http/node1.local'));
    }
}

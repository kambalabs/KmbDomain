<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\GroupParameter;

class GroupParameterTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canAddChild()
    {
        $parameter = new GroupParameter();

        $parameter->addChild(new GroupParameter());

        $this->assertEquals([new GroupParameter()], $parameter->getChildren());
    }

    /** @test */
    public function cannotGetChildWithUnknownName()
    {
        $parameter = new GroupParameter();

        $this->assertNull($parameter->getChildByName('unknown'));
    }

    /** @test */
    public function canGetChildWithName()
    {
        $child = new GroupParameter();
        $child->setName('DocumentRoot');
        $parameter = new GroupParameter();
        $parameter->setChildren([new GroupParameter(), $child, new GroupParameter()]);

        $this->assertEquals($child, $parameter->getChildByName('DocumentRoot'));
    }

    /** @test */
    public function canAddValue()
    {
        $parameter = new GroupParameter();

        $parameter->addValue('test');

        $this->assertEquals(['test'], $parameter->getValues());
    }

    /** @test */
    public function canCheckIfHasValue()
    {
        $parameter = new GroupParameter();
        $parameter->setValues(['test', '/srv/http/node1.local', 'other']);

        $this->assertTrue($parameter->hasValue('/srv/http/node1.local'));
    }

    /** @test */
    public function canCheckIfHasNotValue()
    {
        $parameter = new GroupParameter();

        $this->assertFalse($parameter->hasValue('unknown'));
    }
}

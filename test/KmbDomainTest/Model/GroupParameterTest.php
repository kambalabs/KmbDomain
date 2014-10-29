<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\GroupClass;
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

    /** @test */
    public function canClone()
    {
        $child = new GroupParameter('DocumentRoot', ['/srv/node1.local']);
        $child->setId(2);
        $parameter = new GroupParameter('vhost');
        $parameter->setId(1);
        $parameter->setChildren([$child]);
        $parameter->setClass(new GroupClass('apache::vhost'));

        $newParameter = clone $parameter;

        $this->assertNull($newParameter->getId());
        $this->assertEquals([new GroupParameter('DocumentRoot', ['/srv/node1.local'])], $newParameter->getChildren());
        $this->assertNull($newParameter->getClass());
        $this->assertNull($newParameter->getParent());
    }
}

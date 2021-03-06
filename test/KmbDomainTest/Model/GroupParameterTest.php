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
        $granchild = new GroupParameter('DocumentRoot', ['/srv/node1.local']);
        $granchild->setId(3);
        $child = new GroupParameter('node1.local');
        $child->setChildren([$granchild]);
        $child->setId(2);
        $parameter = new GroupParameter('vhosts');
        $parameter->setId(1);
        $parameter->setChildren([$child]);
        $parameter->setClass(new GroupClass('apache::vhost'));

        $newParameter = clone $parameter;

        $this->assertNull($newParameter->getId());
        $this->assertNull($newParameter->getClass());
        $this->assertNull($newParameter->getParent());
        $children = $newParameter->getChildren();
        $this->assertEquals(1, count($children));
        $this->assertNull($children[0]->getId());
        $this->assertEquals('node1.local', $children[0]->getName());
        $granchildren = $children[0]->getChildren();
        $this->assertEquals(1, count($granchildren));
        $this->assertNull($granchildren[0]->getId());
        $this->assertEquals('DocumentRoot', $granchildren[0]->getName());
    }

    /** @test */
    public function canDump()
    {
        $parameter = new GroupParameter('login');
        $parameter->setValues(['jdoe']);

        $this->assertEquals('jdoe', $parameter->dump());
    }

    /** @test */
    public function canDumpWithMultipleValues()
    {
        $parameter = new GroupParameter('logins');
        $parameter->setValues(['jdoe', 'jmiller']);

        $this->assertEquals(['jdoe', 'jmiller'], $parameter->dump());
    }

    /** @test */
    public function canDumpWithSingleValueAndMultipleValuesTemplate()
    {
        $parameter = new GroupParameter('logins');
        $parameter->setTemplate((object)['multiple_values' => true]);
        $parameter->setValues(['jdoe']);

        $this->assertEquals(['jdoe'], $parameter->dump());
    }

    /** @test */
    public function canDumpEditableHashtable()
    {
        $granchild1 = new GroupParameter('DocumentRoot', ['/srv/node1.local']);
        $granchild2 = new GroupParameter('Ports', ['80', '443']);
        $child = new GroupParameter('node1.local');
        $child->setChildren([$granchild1, $granchild2]);
        $parameter = new GroupParameter('vhosts');
        $parameter->setChildren([$child]);

        $this->assertEquals([
            'node1.local' => [
                'DocumentRoot' => '/srv/node1.local',
                'Ports' => ['80', '443']
            ],
        ], $parameter->dump());
    }
}

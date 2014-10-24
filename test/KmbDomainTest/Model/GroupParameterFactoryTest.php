<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\GroupParameter;
use KmbDomain\Model\GroupParameterFactory;
use KmbDomain\Model\GroupParameterType;

class GroupParameterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  GroupParameterFactory */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new GroupParameterFactory();
    }

    /** @test */
    public function canCreateStringParameter()
    {
        $template = $this->createTemplate('path');

        $parameter = $this->factory->createFromTemplate($template);

        $this->assertInstanceOf('KmbDomain\Model\GroupParameter', $parameter);
        $this->assertEquals('path', $parameter->getName());
        $this->assertEquals($template, $parameter->getTemplate());
        $this->assertEquals([''], $parameter->getValues());
    }

    /** @test */
    public function canCreateBooleanParameter()
    {
        $template = $this->createTemplate('force', true, GroupParameterType::BOOLEAN);

        $parameter = $this->factory->createFromTemplate($template);

        $this->assertEquals([true], $parameter->getValues());
    }

    /** @test */
    public function canCreateRequiredFromTemplates()
    {
        $template = $this->createTemplate('force', true, GroupParameterType::BOOLEAN);
        $expectedParameter = new GroupParameter();
        $expectedParameter->setName('force');
        $expectedParameter->setTemplate($template);
        $expectedParameter->setValues([true]);

        $parameters = $this->factory->createRequiredFromTemplates([$this->createTemplate('path'), $template]);

        $this->assertEquals([$expectedParameter], $parameters);
    }

    protected function createTemplate($name, $required = false, $type = GroupParameterType::STRING, $multipleValues = false, $values = null, $entries = null)
    {
        $template = new \stdClass();
        $template->name = $name;
        $template->required = $required;
        $template->type = $type;
        $template->multiple_values = $multipleValues;
        if ($values !== null) {
            $template->values = $values;
        }
        if ($entries !== null) {
            $template->entries = $entries;
        }
        return $template;
    }
}

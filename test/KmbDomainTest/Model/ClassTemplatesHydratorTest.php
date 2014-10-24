<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\ClassTemplatesHydrator;
use KmbDomain\Model\GroupParameter;
use KmbDomain\Model\ParameterTemplateHydrator;
use KmbDomain\Model\GroupParameterType;
use KmbDomain\Model\GroupClass;
use Zend\Json\Json;

class ClassTemplatesHydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canSetParametersTemplates()
    {
        $hydrator = new ClassTemplatesHydrator();
        $hydrator->setParameterTemplateHydrator(new ParameterTemplateHydrator());
        $parameter = new GroupParameter();
        $parameter->setName('nameserver');
        $class = new GroupClass();
        $class->setParameters([new GroupParameter(), $parameter, new GroupParameter()]);
        $template = $this->createTemplate('nameserver');
        $otherTemplate = $this->createTemplate('other');

        $hydrator->hydrate([$template, $otherTemplate], $class);

        $this->assertEquals($template, $parameter->getTemplate());
        $this->assertEquals([$otherTemplate], $class->getAvailableParameters());
    }

    /**
     * @param $name
     * @param $required
     * @param $multipleValues
     * @param $type
     * @return mixed
     */
    protected function createTemplate($name, $required = true, $multipleValues = false, $type = GroupParameterType::STRING)
    {
        return Json::decode(Json::encode([
            'name' => $name,
            'required' => $required,
            'multiple_values' => $multipleValues,
            'type' => $type,
        ]));
    }
}

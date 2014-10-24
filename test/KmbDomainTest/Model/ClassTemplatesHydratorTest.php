<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\ClassTemplatesHydrator;
use KmbDomain\Model\Parameter;
use KmbDomain\Model\ParameterTemplateHydrator;
use KmbDomain\Model\ParameterType;
use KmbDomain\Model\PuppetClass;
use Zend\Json\Json;

class ClassTemplatesHydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canSetParametersTemplates()
    {
        $hydrator = new ClassTemplatesHydrator();
        $hydrator->setParameterTemplateHydrator(new ParameterTemplateHydrator());
        $parameter = new Parameter();
        $parameter->setName('nameserver');
        $class = new PuppetClass();
        $class->setParameters([new Parameter(), $parameter, new Parameter()]);
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
    protected function createTemplate($name, $required = true, $multipleValues = false, $type = ParameterType::STRING)
    {
        return Json::decode(Json::encode([
            'name' => $name,
            'required' => $required,
            'multiple_values' => $multipleValues,
            'type' => $type,
        ]));
    }
}

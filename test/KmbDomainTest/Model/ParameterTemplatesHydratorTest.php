<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Parameter;
use KmbDomain\Model\ParameterTemplateHydrator;
use KmbDomain\Model\ParameterType;
use Zend\Json\Json;

class ParameterTemplatesHydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ParameterTemplateHydrator */
    protected $hydrator;

    protected function setUp()
    {
        $this->hydrator = new ParameterTemplateHydrator();
    }

    /** @test */
    public function canSetRecursiveStringTemplate()
    {
        $parameter = new Parameter();
        $parameter->setName('ports');
        $parameter->setValues(['80', '443']);
        $template = $this->createPredefinedListTemplate();

        $this->hydrator->hydrate($template, $parameter);

        $this->assertEquals($template, $parameter->getTemplate());
        $this->assertEquals(['8080', '9090'], $parameter->getAvailableValues());
    }

    /** @test */
    public function canSetRecursiveHashtableTemplate()
    {
        $child1 = new Parameter();
        $child1->setName('user');
        $child1->setValues(['jdoe']);
        $child2 = new Parameter();
        $child2->setName('homedir');
        $child2->setValues(['/home/jdoe']);
        $parameter = new Parameter();
        $parameter->setName('admin');
        $parameter->setChildren([$child1, $child2]);
        $template = $this->createHashtableTemplate();

        $this->hydrator->hydrate($template, $parameter);

        $this->assertEquals($template, $parameter->getTemplate());
        $child1Template = $child1->getTemplate();
        $this->assertNotNull($child1Template);
        $this->assertEquals('user', $child1Template->name);
        $availableSiblings = $child1->getAvailableSiblings();
        $this->assertEquals(1, count($availableSiblings));
        $this->assertEquals('group', $availableSiblings[0]->name);
    }

    /** @test */
    public function canSetRecursiveEditableHashtableTemplate()
    {
        $granchild1 = new Parameter();
        $granchild1->setName('user');
        $granchild1->setValues(['jdoe']);
        $granchild2 = new Parameter();
        $granchild2->setName('homedir');
        $granchild2->setValues(['/home/jdoe']);
        $child = new Parameter();
        $child->setName('root');
        $child->setChildren([$granchild1, $granchild2]);
        $parameter = new Parameter();
        $parameter->setName('sshusers');
        $parameter->setChildren([$child]);
        $template = $this->createEditableHashtableTemplate();

        $this->hydrator->hydrate($template, $parameter);

        $this->assertEquals($template, $parameter->getTemplate());
        $childTemplate = $child->getTemplate();
        $this->assertNotNull($childTemplate);
        $this->assertEquals('sshusers', $childTemplate->name);
        $granchild1Template = $granchild1->getTemplate();
        $this->assertNotNull($granchild1Template);
        $this->assertEquals('user', $granchild1Template->name);
        $availableSiblings = $granchild1->getAvailableSiblings();
        $this->assertEquals(3, count($availableSiblings));
        $this->assertEquals('group', $availableSiblings[0]->name);
        $this->assertEquals(['jmiller', 'psmith'], $granchild1->getAvailableValues());
    }

    protected function createPredefinedListTemplate()
    {
        return Json::decode(Json::encode([
            'name' => 'ports',
            'required' => true,
            'multiple_values' => true,
            'type' => ParameterType::PREDEFINED_LIST,
            'values' => [ '80', '443', '8080', '9090' ],
        ]));
    }

    protected function createHashtableTemplate()
    {
        return Json::decode(Json::encode([
            'name' => 'admin',
            'required' => true,
            'multiple_values' => false,
            'type' => ParameterType::HASHTABLE,
            'entries' => [
                [
                    'name' => 'homedir',
                    'required' => true,
                    'multiple_values' => false,
                    'type' => ParameterType::STRING,
                ],
                [
                    'name' => 'user',
                    'required' => false,
                    'multiple_values' => false,
                    'type' => ParameterType::STRING,
                ],
                [
                    'name' => 'group',
                    'required' => false,
                    'multiple_values' => true,
                    'type' => ParameterType::STRING,
                ],
            ]
        ]));
    }

    protected function createEditableHashtableTemplate()
    {
        return Json::decode(Json::encode([
            'name' => 'sshusers',
            'required' => true,
            'multiple_values' => false,
            'type' => ParameterType::EDITABLE_HASHTABLE,
            'entries' => [
                [
                    'name' => 'user',
                    'required' => true,
                    'multiple_values' => false,
                    'type' => ParameterType::PREDEFINED_LIST,
                    'values' => [
                        'jdoe',
                        'jmiller',
                        'psmith',
                    ],
                ],
                [
                    'name' => 'homedir',
                    'required' => true,
                    'multiple_values' => false,
                    'type' => ParameterType::STRING,
                ],
                [
                    'name' => 'group',
                    'required' => false,
                    'multiple_values' => true,
                    'type' => ParameterType::STRING,
                ],
                [
                    'name' => 'keypath',
                    'required' => false,
                    'multiple_values' => false,
                    'type' => ParameterType::STRING,
                ],
                [
                    'name' => 'keygroup',
                    'required' => false,
                    'multiple_values' => false,
                    'type' => ParameterType::STRING,

                ],
            ]
        ]));
    }
}

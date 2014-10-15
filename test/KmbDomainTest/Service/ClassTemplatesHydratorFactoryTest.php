<?php
namespace KmbDomainTest\Service;

use KmbDomain\Model\ClassTemplatesHydrator;
use KmbDomainTest\Bootstrap;

class ClassTemplatesHydratorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canCreateService()
    {
        /** @var ClassTemplatesHydrator $service */
        $service = Bootstrap::getServiceManager()->get('classTemplatesHydrator');

        $this->assertInstanceOf('KmbDomain\Model\ClassTemplatesHydrator', $service);
        $this->assertInstanceOf('KmbDomain\Model\ParameterTemplateHydrator', $service->getParameterTemplateHydrator());
    }
}

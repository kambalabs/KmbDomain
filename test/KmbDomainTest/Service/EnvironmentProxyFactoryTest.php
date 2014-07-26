<?php
namespace KmbDomainTest\Service;

use KmbDomain\Model\Environment;
use KmbDomain\Service\EnvironmentProxyFactory;
use KmbDomainTest\Bootstrap;

class EnvironmentProxyFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canCreateProxy()
    {
        $factory = new EnvironmentProxyFactory();
        $factory->setServiceManager(Bootstrap::getServiceManager());
        $environment = new Environment();
        $environment->setId(1);
        $environment->setName('STABLE');

        /** @var \KmbDomain\Model\EnvironmentProxy $proxy */
        $proxy = $factory->createProxy($environment);

        $this->assertInstanceOf('KmbDomain\Model\EnvironmentProxy', $proxy);
        $this->assertEquals($environment, $proxy->getAggregateRoot());
        $this->assertInstanceOf('KmbDomain\Model\EnvironmentRepositoryInterface', $proxy->getEnvironmentRepository());
    }
}

<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\PuppetClass;
use KmbDomain\Model\PuppetClassValidator;

class PuppetClassValidatorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canValidateValidClass()
    {
        $class = new PuppetClass();
        $class->setName('apache::vhost');
        $validator = new PuppetClassValidator();

        $this->assertTrue($validator->isValid($class));
    }
}

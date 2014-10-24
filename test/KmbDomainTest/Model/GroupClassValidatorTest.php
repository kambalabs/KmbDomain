<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\GroupClass;
use KmbDomain\Model\GroupClassValidator;

class GroupClassValidatorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function canValidateValidClass()
    {
        $class = new GroupClass();
        $class->setName('apache::vhost');
        $validator = new GroupClassValidator();

        $this->assertTrue($validator->isValid($class));
    }
}

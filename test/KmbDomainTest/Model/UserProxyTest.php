<?php
namespace KmbDomainTest\Model;

use KmbDomain\Model\Environment;
use KmbDomain\Model\User;
use KmbDomain\Model\UserInterface;
use KmbDomain\Model\UserProxy;

class UserProxyTest extends \PHPUnit_Framework_TestCase
{
    /** @var UserProxy */
    protected $proxy;

    /** @var User */
    protected $aggregateRoot;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $environmentRepository;

    protected function setUp()
    {
        $this->environmentRepository = $this->getMock('KmbDomain\Model\EnvironmentRepositoryInterface');
        $this->proxy = $this->createProxy(1, 'jdoe', 'John DOE', 'jdoe@gmail.com', UserInterface::ROLE_ROOT);
        $this->aggregateRoot = $this->proxy->getAggregateRoot();
    }

    /** @test */
    public function canSetId()
    {
        $this->proxy->setId(2);

        $this->assertEquals(2, $this->aggregateRoot->getId());
    }

    /** @test */
    public function canGetId()
    {
        $this->assertEquals(1, $this->proxy->getId());
    }

    /** @test */
    public function canSetLogin()
    {
        $this->proxy->setLogin('psmith');

        $this->assertEquals('psmith', $this->aggregateRoot->getLogin());
    }

    /** @test */
    public function canGetLogin()
    {
        $this->assertEquals('jdoe', $this->proxy->getLogin());
    }

    /** @test */
    public function canSetName()
    {
        $this->proxy->setName('Paul SMITH');

        $this->assertEquals('Paul SMITH', $this->aggregateRoot->getName());
    }

    /** @test */
    public function canGetName()
    {
        $this->assertEquals('John DOE', $this->proxy->getName());
    }

    /** @test */
    public function canSetEmail()
    {
        $this->proxy->setEmail('psmith@gmail.com');

        $this->assertEquals('psmith@gmail.com', $this->aggregateRoot->getEmail());
    }

    /** @test */
    public function canGetEmail()
    {
        $this->assertEquals('jdoe@gmail.com', $this->proxy->getEmail());
    }

    /** @test */
    public function canSetRole()
    {
        $this->proxy->setRole(UserInterface::ROLE_USER);

        $this->assertEquals(UserInterface::ROLE_USER, $this->aggregateRoot->getRole());
    }

    /** @test */
    public function canGetRole()
    {
        $this->assertEquals(UserInterface::ROLE_ROOT, $this->proxy->getRole());
    }

    /** @test */
    public function canGetRoles()
    {
        $this->assertEquals([UserInterface::ROLE_ROOT], $this->proxy->getRoles());
    }

    /** @test */
    public function canGetEnvironmentsFromRepository()
    {
        $environments = [new Environment(), new Environment()];
        $this->environmentRepository->expects($this->any())
            ->method('getAllForUser')
            ->with($this->equalTo($this->proxy))
            ->will($this->returnValue($environments));

        $this->assertEquals($environments, $this->proxy->getEnvironments());
    }

    /**
     * @param int    $id
     * @param string $login
     * @param string $name
     * @param string $email
     * @param string $role
     * @return User
     */
    protected function createUser($id = null, $login = null, $name = null, $email = null, $role = null)
    {
        $user = new User($login, $name, $email, $role);
        return $user->setId($id);
    }

    /**
     * @param int    $id
     * @param string $login
     * @param string $name
     * @param string $email
     * @param string $role
     * @return UserProxy
     */
    protected function createProxy($id = null, $login = null, $name = null, $email = null, $role = null)
    {
        $proxy = new UserProxy();
        $proxy->setEnvironmentRepository($this->environmentRepository);
        return $proxy->setAggregateRoot($this->createUser($id, $login, $name, $email, $role));
    }
}

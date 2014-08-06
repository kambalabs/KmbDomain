<?php
/**
 * @copyright Copyright (c) 2014 Orange Applications for Business
 * @link      http://github.com/kambalabs for the sources repositories
 *
 * This file is part of Kamba.
 *
 * Kamba is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * Kamba is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kamba.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace KmbDomain\Model;

use GtnPersistBase\Model\AggregateRootInterface;
use GtnPersistZendDb\Model\AggregateRootProxyInterface;

class UserProxy implements UserInterface, AggregateRootProxyInterface
{
    /** @var User */
    protected $aggregateRoot;

    /** @var EnvironmentRepositoryInterface */
    protected $environmentRepository;

    /** @var EnvironmentInterface[] */
    protected $environments;

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return AggregateRootProxyInterface
     */
    public function setAggregateRoot(AggregateRootInterface $aggregateRoot)
    {
        $this->aggregateRoot = $aggregateRoot;
        return $this;
    }

    /**
     * return AggregateRootInterface
     */
    public function getAggregateRoot()
    {
        return $this->aggregateRoot;
    }

    /**
     * Set EnvironmentRepository.
     *
     * @param EnvironmentRepositoryInterface $environmentRepository
     * @return UserProxy
     */
    public function setEnvironmentRepository($environmentRepository)
    {
        $this->environmentRepository = $environmentRepository;
        return $this;
    }

    /**
     * Get EnvironmentRepository.
     *
     * @return EnvironmentRepositoryInterface
     */
    public function getEnvironmentRepository()
    {
        return $this->environmentRepository;
    }

    /**
     * Set Id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id)
    {
        $this->aggregateRoot->setId($id);
        return $this;
    }

    /**
     * Get Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->aggregateRoot->getId();
    }

    /**
     * Set Login.
     *
     * @param string $login
     * @return UserInterface
     */
    public function setLogin($login)
    {
        $this->aggregateRoot->setLogin($login);
        return $this;
    }

    /**
     * Get Login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->aggregateRoot->getLogin();
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return UserInterface
     */
    public function setName($name)
    {
        $this->aggregateRoot->setName($name);
        return $this;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->aggregateRoot->getName();
    }

    /**
     * Set Email.
     *
     * @param string $email
     * @return UserInterface
     */
    public function setEmail($email)
    {
        $this->aggregateRoot->setEmail($email);
        return $this;
    }

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->aggregateRoot->getEmail();
    }

    /**
     * Set Role.
     *
     * @param string $role
     * @return UserInterface
     */
    public function setRole($role)
    {
        $this->aggregateRoot->setRole($role);
        return $this;
    }

    /**
     * Get Role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->aggregateRoot->getRole();
    }

    /**
     * Get the list of roles of this identity
     *
     * @return string[]|\Rbac\Role\RoleInterface[]
     */
    public function getRoles()
    {
        return $this->aggregateRoot->getRoles();
    }

    /**
     * Set Environments.
     *
     * @param EnvironmentInterface[] $environments
     * @return UserInterface
     */
    public function setEnvironments($environments)
    {
        $this->environments = $environments;
        return $this;
    }

    /**
     * Add Environment.
     *
     * @param EnvironmentInterface $environment
     * @return UserInterface
     */
    public function addEnvironment($environment)
    {
        $this->environments[] = $environment;
        return $this;
    }

    /**
     * Get Environments.
     *
     * @return EnvironmentInterface[]
     */
    public function getEnvironments()
    {
        if ($this->environments === null) {
            $this->setEnvironments($this->getEnvironmentRepository()->getAllForUser($this));
        }
        return $this->environments;
    }
}

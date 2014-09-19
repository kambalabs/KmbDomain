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

class PuppetClass implements PuppetClassInterface
{
    /** @var  int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var GroupInterface */
    protected $group;

    /** @var ParameterInterface[] */
    protected $parameters;

    /**
     * Set Id.
     *
     * @param int $id
     * @return PuppetClass
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return PuppetClass
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Group.
     *
     * @param \KmbDomain\Model\GroupInterface $group
     * @return PuppetClass
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Get Group.
     *
     * @return \KmbDomain\Model\GroupInterface
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set Parameters.
     *
     * @param \KmbDomain\Model\ParameterInterface[] $parameters
     * @return PuppetClass
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * Get Parameters.
     *
     * @return \KmbDomain\Model\ParameterInterface[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}

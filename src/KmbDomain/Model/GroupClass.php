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

class GroupClass implements GroupClassInterface
{
    /** @var  int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var GroupInterface */
    protected $group;

    /** @var GroupParameterInterface[] */
    protected $parameters;

    /** @var  \stdClass[] */
    protected $availableParameters;

    /**
     * Set Id.
     *
     * @param int $id
     * @return GroupClass
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
     * @return GroupClass
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
     * @return GroupClass
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
     * @param \KmbDomain\Model\GroupParameterInterface[] $parameters
     * @return GroupClass
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * Add specified parameter.
     *
     * @param \KmbDomain\Model\GroupParameterInterface
     * @return GroupClass
     */
    public function addParameter($parameter)
    {
        $this->parameters[] = $parameter;
        return $this;
    }

    /**
     * Get Parameters.
     *
     * @return \KmbDomain\Model\GroupParameterInterface[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return bool
     */
    public function hasParameters()
    {
        return count($this->parameters) > 0;
    }

    /**
     * @param string $name
     * @return \KmbDomain\Model\GroupParameterInterface
     */
    public function getParameterByName($name)
    {
        if ($this->hasParameters()) {
            foreach ($this->parameters as $parameter) {
                if ($parameter->getName() === $name) {
                    return $parameter;
                }
            }
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasParameterWithName($name)
    {
        return $this->getParameterByName($name) !== null;
    }

    /**
     * Set AvailableParameters.
     *
     * @param \stdClass[] $availableParameters
     * @return GroupClass
     */
    public function setAvailableParameters($availableParameters)
    {
        $this->availableParameters = $availableParameters;
        return $this;
    }

    /**
     * Get AvailableParameters.
     *
     * @return \stdClass[]
     */
    public function getAvailableParameters()
    {
        return $this->availableParameters;
    }

    /**
     * @return bool
     */
    public function hasAvailableParameters()
    {
        return !empty($this->availableParameters);
    }
}

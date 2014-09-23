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

class Parameter implements ParameterInterface
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var PuppetClassInterface */
    protected $class;

    /** @var ValueInterface[] */
    protected $values;

    /** @var ParameterInterface */
    protected $parent;

    /** @var ParameterInterface[] */
    protected $children;

    /**
     * Set Id.
     *
     * @param int $id
     * @return Parameter
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
     * @return Parameter
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
     * Set Class.
     *
     * @param \KmbDomain\Model\PuppetClassInterface $class
     * @return Parameter
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * Get Class.
     *
     * @return \KmbDomain\Model\PuppetClassInterface
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set Values.
     *
     * @param \KmbDomain\Model\ValueInterface[] $values
     * @return Parameter
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }

    /**
     * Get Values.
     *
     * @return \KmbDomain\Model\ValueInterface[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * Set Parent.
     *
     * @param \KmbDomain\Model\ParameterInterface $parent
     * @return Parameter
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get Parent.
     *
     * @return \KmbDomain\Model\ParameterInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return bool
     */
    public function hasParent()
    {
        return $this->parent !== null;
    }

    /**
     * Set Children.
     *
     * @param \KmbDomain\Model\ParameterInterface[] $children
     * @return Parameter
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * Get Children.
     *
     * @return \KmbDomain\Model\ParameterInterface[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {
        return !empty($this->children);
    }
}

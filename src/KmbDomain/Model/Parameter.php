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

    /** @var array */
    protected $values;

    /** @var ParameterInterface */
    protected $parent;

    /** @var ParameterInterface[] */
    protected $children;

    /** @var  \stdClass */
    protected $template;

    /** @var  \stdClass[] */
    protected $availableChildren = [];

    /** @var  array */
    protected $availableValues = [];

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
     * @param array $values
     * @return Parameter
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }

    /**
     * Add specified value.
     *
     * @param mixed $value
     * @return Parameter
     */
    public function addValue($value)
    {
        $this->values[] = $value;
        return $this;
    }

    /**
     * Get Values.
     *
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return bool
     */
    public function hasValues()
    {
        return count($this->values) > 0;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function hasValue($value)
    {
        return $this->hasValues() && in_array($value, $this->values);
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
     * Get all ancestors names.
     * It includes the name of the object itself.
     *
     * @return array
     */
    public function getAncestorsNames()
    {
        $names = [];
        if ($this->hasParent()) {
            $names = $this->getParent()->getAncestorsNames();
        }
        $names[] = $this->getName();
        return $names;
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
     * Add specified child.
     *
     * @param \KmbDomain\Model\ParameterInterface $child
     * @return Parameter
     */
    public function addChild($child)
    {
        $this->children[] = $child;
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

    /**
     * @param string $name
     * @return \KmbDomain\Model\ParameterInterface
     */
    public function getChildByName($name)
    {
        if ($this->hasChildren()) {
            foreach ($this->children as $child) {
                if ($child->getName() === $name) {
                    return $child;
                }
            }
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasChildWithName($name)
    {
        return $this->getChildByName($name) !== null;
    }

    /**
     * Set Template.
     *
     * @param \stdClass $template
     * @return Parameter
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * Get Template.
     *
     * @return \stdClass
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Check if template is set.
     *
     * @return bool
     */
    public function hasTemplate()
    {
        return $this->template !== null;
    }

    /**
     * Set Available Children.
     *
     * @param \stdClass[] $availableChildren
     * @return Parameter
     */
    public function setAvailableChildren($availableChildren)
    {
        $this->availableChildren = $availableChildren;
        return $this;
    }

    /**
     * Get Available Children.
     *
     * @return \stdClass[]
     */
    public function getAvailableChildren()
    {
        return $this->availableChildren;
    }

    /**
     * @return bool
     */
    public function hasAvailableChildren()
    {
        return !empty($this->availableChildren);
    }

    /**
     * Set AvailableValues.
     *
     * @param array $availableValues
     * @return Parameter
     */
    public function setAvailableValues($availableValues)
    {
        $this->availableValues = $availableValues;
        return $this;
    }

    /**
     * Get AvailableValues.
     *
     * @return array
     */
    public function getAvailableValues()
    {
        return $this->availableValues;
    }

    /**
     * @return bool
     */
    public function hasAvailableValues()
    {
        return !empty($this->availableValues);
    }
}

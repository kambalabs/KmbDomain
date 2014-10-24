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

interface GroupParameterInterface extends AggregateRootInterface
{
    /**
     * Set Name.
     *
     * @param string $name
     * @return GroupParameterInterface
     */
    public function setName($name);

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set Class.
     *
     * @param \KmbDomain\Model\GroupClassInterface $class
     * @return GroupParameterInterface
     */
    public function setClass($class);

    /**
     * Get Class.
     *
     * @return \KmbDomain\Model\GroupClassInterface
     */
    public function getClass();

    /**
     * Set Values.
     *
     * @param array $values
     * @return GroupParameterInterface
     */
    public function setValues($values);

    /**
     * Add specified value.
     *
     * @param array $value
     * @return GroupParameterInterface
     */
    public function addValue($value);

    /**
     * Get Values.
     *
     * @return array
     */
    public function getValues();

    /**
     * @return bool
     */
    public function hasValues();

    /**
     * @param string $value
     * @return bool
     */
    public function hasValue($value);

    /**
     * Set Parent.
     *
     * @param \KmbDomain\Model\GroupParameterInterface $parent
     * @return GroupParameterInterface
     */
    public function setParent($parent);

    /**
     * Get Parent.
     *
     * @return \KmbDomain\Model\GroupParameterInterface
     */
    public function getParent();

    /**
     * @return bool
     */
    public function hasParent();

    /**
     * Get all ancestors names.
     * It includes the name of the object itself.
     *
     * @return array
     */
    public function getAncestorsNames();

    /**
     * Set Children.
     *
     * @param \KmbDomain\Model\GroupParameterInterface[] $children
     * @return GroupParameterInterface
     */
    public function setChildren($children);

    /**
     * Add specified child.
     *
     * @param \KmbDomain\Model\GroupParameterInterface $child
     * @return GroupParameterInterface
     */
    public function addChild($child);

    /**
     * Get Children.
     *
     * @return \KmbDomain\Model\GroupParameterInterface[]
     */
    public function getChildren();

    /**
     * @return bool
     */
    public function hasChildren();

    /**
     * @param string $name
     * @return \KmbDomain\Model\GroupParameterInterface
     */
    public function getChildByName($name);

    /**
     * @param string $name
     * @return bool
     */
    public function hasChildWithName($name);

    /**
     * Set Template.
     *
     * @param \stdClass $template
     * @return GroupParameterInterface
     */
    public function setTemplate($template);

    /**
     * Get Template.
     *
     * @return \stdClass
     */
    public function getTemplate();

    /**
     * Check if template is set.
     *
     * @return bool
     */
    public function hasTemplate();

    /**
     * Set available children.
     *
     * @param \stdClass[] $availableChildren
     * @return GroupParameterInterface
     */
    public function setAvailableChildren($availableChildren);

    /**
     * Get available children.
     *
     * @return \stdClass[]
     */
    public function getAvailableChildren();

    /**
     * @return bool
     */
    public function hasAvailableChildren();

    /**
     * Set AvailableValues.
     *
     * @param array $availableValues
     * @return GroupParameterInterface
     */
    public function setAvailableValues($availableValues);

    /**
     * Get AvailableValues.
     *
     * @return array
     */
    public function getAvailableValues();

    /**
     * @return bool
     */
    public function hasAvailableValues();
}

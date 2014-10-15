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

interface ParameterInterface extends AggregateRootInterface
{
    /**
     * Set Name.
     *
     * @param string $name
     * @return ParameterInterface
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
     * @param \KmbDomain\Model\PuppetClassInterface $class
     * @return ParameterInterface
     */
    public function setClass($class);

    /**
     * Get Class.
     *
     * @return \KmbDomain\Model\PuppetClassInterface
     */
    public function getClass();

    /**
     * Set Values.
     *
     * @param \KmbDomain\Model\ValueInterface[] $values
     * @return ParameterInterface
     */
    public function setValues($values);

    /**
     * Add specified value.
     *
     * @param \KmbDomain\Model\ValueInterface $value
     * @return ParameterInterface
     */
    public function addValue($value);

    /**
     * Get Values.
     *
     * @return \KmbDomain\Model\ValueInterface[]
     */
    public function getValues();

    /**
     * @return bool
     */
    public function hasValues();

    /**
     * @param string $name
     * @return \KmbDomain\Model\ValueInterface
     */
    public function getValueByName($name);

    /**
     * @param string $name
     * @return bool
     */
    public function hasValueWithName($name);

    /**
     * Set Parent.
     *
     * @param \KmbDomain\Model\ParameterInterface $parent
     * @return ParameterInterface
     */
    public function setParent($parent);

    /**
     * Get Parent.
     *
     * @return \KmbDomain\Model\ParameterInterface
     */
    public function getParent();

    /**
     * @return bool
     */
    public function hasParent();

    /**
     * Set Children.
     *
     * @param \KmbDomain\Model\ParameterInterface[] $children
     * @return ParameterInterface
     */
    public function setChildren($children);

    /**
     * Add specified child.
     *
     * @param \KmbDomain\Model\ParameterInterface $child
     * @return ParameterInterface
     */
    public function addChild($child);

    /**
     * Get Children.
     *
     * @return \KmbDomain\Model\ParameterInterface[]
     */
    public function getChildren();

    /**
     * @return bool
     */
    public function hasChildren();

    /**
     * @param string $name
     * @return \KmbDomain\Model\ParameterInterface
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
     * @return ParameterInterface
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
     * Set available siblings.
     *
     * @param \stdClass[] $availableSiblings
     * @return ParameterInterface
     */
    public function setAvailableSiblings($availableSiblings);

    /**
     * Get available siblings.
     *
     * @return \stdClass[]
     */
    public function getAvailableSiblings();

    /**
     * Set AvailableValues.
     *
     * @param array $availableValues
     * @return ParameterInterface
     */
    public function setAvailableValues($availableValues);

    /**
     * Get AvailableValues.
     *
     * @return array
     */
    public function getAvailableValues();
}

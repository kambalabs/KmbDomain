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
     * Set Ordering.
     *
     * @param int $ordering
     * @return ParameterInterface
     */
    public function setOrdering($ordering);

    /**
     * Get Ordering.
     *
     * @return int
     */
    public function getOrdering();

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
     * Get Values.
     *
     * @return \KmbDomain\Model\ValueInterface[]
     */
    public function getValues();

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
     * Set Children.
     *
     * @param \KmbDomain\Model\ParameterInterface[] $children
     * @return ParameterInterface
     */
    public function setChildren($children);

    /**
     * Get Children.
     *
     * @return \KmbDomain\Model\ParameterInterface[]
     */
    public function getChildren();
}

<?php
/**
 * @copyright Copyright (c) 2014 Orange Applications for Business
 * @link      http://github.com/multimediabs/kamba for the canonical source repository
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

interface EnvironmentInterface extends AggregateRootInterface
{
    /**
     * Set Name.
     *
     * @param string $name
     * @return EnvironmentInterface
     */
    public function setName($name);

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get NormalizedName.
     *
     * @return string
     */
    public function getNormalizedName();

    /**
     * Get all ancestors names.
     * It includes the name of the object itself.
     *
     * @return array
     */
    public function getAncestorsNames();

    /**
     * Set Parent.
     *
     * @param EnvironmentInterface $parent
     * @return EnvironmentInterface
     */
    public function setParent($parent);

    /**
     * Get Parent.
     *
     * @return EnvironmentInterface
     */
    public function getParent();

    /**
     * @return bool
     */
    public function hasParent();

    /**
     * @param EnvironmentInterface $environment
     * @return bool
     */
    public function isAncestorOf($environment);

    /**
     * Set Children.
     *
     * @param array $children
     * @return EnvironmentInterface
     */
    public function setChildren($children);

    /**
     * @param EnvironmentInterface $child
     * @return EnvironmentInterface
     */
    public function addChild($child);

    /**
     * Get Children.
     *
     * @return array
     */
    public function getChildren();

    /**
     * @return bool
     */
    public function hasChildren();

    /**
     * @param $name
     * @return bool
     */
    public function hasChildWithName($name);
}

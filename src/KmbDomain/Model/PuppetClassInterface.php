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

interface PuppetClassInterface extends AggregateRootInterface
{
    /**
     * Set Name.
     *
     * @param string $name
     * @return PuppetClass
     */
    public function setName($name);

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set Group.
     *
     * @param \KmbDomain\Model\Group $group
     * @return PuppetClass
     */
    public function setGroup($group);

    /**
     * Get Group.
     *
     * @return \KmbDomain\Model\Group
     */
    public function getGroup();

    /**
     * Set Parameters.
     *
     * @param \KmbDomain\Model\Parameter[] $parameters
     * @return PuppetClass
     */
    public function setParameters($parameters);

    /**
     * Get Parameters.
     *
     * @return \KmbDomain\Model\Parameter[]
     */
    public function getParameters();
}

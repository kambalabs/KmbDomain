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

interface GroupClassInterface extends AggregateRootInterface
{
    /**
     * Set Name.
     *
     * @param string $name
     * @return GroupClassInterface
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
     * @param \KmbDomain\Model\GroupInterface $group
     * @return GroupClassInterface
     */
    public function setGroup($group);

    /**
     * Get Group.
     *
     * @return \KmbDomain\Model\GroupInterface
     */
    public function getGroup();

    /**
     * Set Parameters.
     *
     * @param \KmbDomain\Model\GroupParameterInterface[] $parameters
     * @return GroupClassInterface
     */
    public function setParameters($parameters);

    /**
     * Add specified parameter.
     *
     * @param \KmbDomain\Model\GroupParameterInterface
     * @return GroupClassInterface
     */
    public function addParameter($parameter);

    /**
     * Get Parameters.
     *
     * @return \KmbDomain\Model\GroupParameterInterface[]
     */
    public function getParameters();

    /**
     * @return bool
     */
    public function hasParameters();

    /**
     * @param string $name
     * @return \KmbDomain\Model\GroupParameterInterface
     */
    public function getParameterByName($name);

    /**
     * @param string $name
     * @return bool
     */
    public function hasParameterWithName($name);

    /**
     * Set AvailableParameters.
     *
     * @param \stdClass[] $availableParameters
     * @return GroupClassInterface
     */
    public function setAvailableParameters($availableParameters);

    /**
     * Get AvailableParameters.
     *
     * @return \stdClass[]
     */
    public function getAvailableParameters();

    /**
     * @return bool
     */
    public function hasAvailableParameters();

    /**
     * Dump parameters.
     *
     * @return array
     */
    public function dump();
}

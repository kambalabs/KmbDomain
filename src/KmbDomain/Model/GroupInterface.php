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

interface GroupInterface extends AggregateRootInterface
{
    /**
     * Set Revision.
     *
     * @param \KmbDomain\Model\RevisionInterface $revision
     * @return GroupInterface
     */
    public function setRevision($revision);

    /**
     * Get Revision.
     *
     * @return \KmbDomain\Model\RevisionInterface
     */
    public function getRevision();

    /**
     * Set Environment.
     *
     * @param \KmbDomain\Model\EnvironmentInterface $environment
     * @return GroupInterface
     */
    public function setEnvironment($environment);

    /**
     * Get Environment.
     *
     * @return \KmbDomain\Model\EnvironmentInterface
     */
    public function getEnvironment();

    /**
     * Set Name.
     *
     * @param string $name
     * @return GroupInterface
     */
    public function setName($name);

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set IncludePattern.
     *
     * @param string $includePattern
     * @return GroupInterface
     */
    public function setIncludePattern($includePattern);

    /**
     * Get IncludePattern.
     *
     * @return string
     */
    public function getIncludePattern();

    /**
     * Set ExcludePattern.
     *
     * @param string $excludePattern
     * @return GroupInterface
     */
    public function setExcludePattern($excludePattern);

    /**
     * Get ExcludePattern.
     *
     * @return string
     */
    public function getExcludePattern();

    /**
     * Set Ordering.
     *
     * @param int $ordering
     * @return GroupInterface
     */
    public function setOrdering($ordering);

    /**
     * Get Ordering.
     *
     * @return int
     */
    public function getOrdering();

    /**
     * Set Classes.
     *
     * @param \KmbDomain\Model\GroupClassInterface[] $classes
     * @return GroupInterface
     */
    public function setClasses($classes);

    /**
     * Add specified class.
     *
     * @param GroupClassInterface $class
     * @return GroupInterface
     */
    public function addClass($class);

    /**
     * Get Classes.
     *
     * @return \KmbDomain\Model\GroupClassInterface[]
     */
    public function getClasses();

    /**
     * @return bool
     */
    public function hasClasses();

    /**
     * @param string $name
     * @return GroupClassInterface
     */
    public function getClassByName($name);

    /**
     * @param string $name
     * @return bool
     */
    public function hasClassWithName($name);

    /**
     * Dump group classes.
     *
     * @return array
     */
    public function dump();

    /**
     * Set AvailableClasses.
     *
     * @param array $availableClasses
     * @return Group
     */
    public function setAvailableClasses($availableClasses);

    /**
     * Get AvailableClasses.
     *
     * @return array
     */
    public function getAvailableClasses();

    /**
     * @return bool
     */
    public function hasAvailableClasses();

    /**
     * @param string $hostname
     * @return bool
     */
    public function matchesForHostname($hostname);
}

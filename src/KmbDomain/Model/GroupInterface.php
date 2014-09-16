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
     * @param \KmbDomain\Model\Revision $revision
     * @return Group
     */
    public function setRevision($revision);

    /**
     * Get Revision.
     *
     * @return \KmbDomain\Model\Revision
     */
    public function getRevision();

    /**
     * Set Environment.
     *
     * @param \KmbDomain\Model\Environment $environment
     * @return Group
     */
    public function setEnvironment($environment);

    /**
     * Get Environment.
     *
     * @return \KmbDomain\Model\Environment
     */
    public function getEnvironment();

    /**
     * Set Name.
     *
     * @param string $name
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * @return Group
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
     * @param \KmbDomain\Model\PuppetClass[] $classes
     * @return Group
     */
    public function setClasses($classes);

    /**
     * Get Classes.
     *
     * @return \KmbDomain\Model\PuppetClass[]
     */
    public function getClasses();
}

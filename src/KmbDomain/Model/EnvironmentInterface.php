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
     * Get all descendants.
     *
     * @return EnvironmentInterface[]
     */
    public function getDescendants();

    /**
     * @param $name
     * @return EnvironmentInterface
     */
    public function getDescendantByNormalizedName($name);

    /**
     * Set Children.
     *
     * @param EnvironmentInterface[] $children
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
     * @return EnvironmentInterface[]
     */
    public function getChildren();

    /**
     * @return bool
     */
    public function hasChildren();

    /**
     * @param $name
     * @return EnvironmentInterface
     */
    public function getChildByName($name);

    /**
     * @param $name
     * @return bool
     */
    public function hasChildWithName($name);

    /**
     * Set Users.
     *
     * @param array $users
     * @return EnvironmentInterface
     */
    public function setUsers($users);

    /**
     * @param UserInterface[] $users
     * @return EnvironmentInterface
     */
    public function addUsers($users);

    /**
     * @param int $userId
     * @return EnvironmentInterface
     */
    public function removeUserById($userId);

    /**
     * Get Users.
     *
     * @return UserInterface[]
     */
    public function getUsers();

    /**
     * @return bool
     */
    public function hasUsers();

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function hasUser($user);

    /**
     * @param bool $default
     * @return EnvironmentInterface
     */
    public function setDefault($default);

    /**
     * @return bool
     */
    public function isDefault();

    /**
     * Set CurrentRevision.
     *
     * @param \KmbDomain\Model\RevisionInterface $currentRevision
     * @return Environment
     */
    public function setCurrentRevision($currentRevision);

    /**
     * Get CurrentRevision.
     *
     * @return \KmbDomain\Model\RevisionInterface
     */
    public function getCurrentRevision();

    /**
     * Set LastReleasedRevision.
     *
     * @param \KmbDomain\Model\RevisionInterface $lastReleasedRevision
     * @return Environment
     */
    public function setLastReleasedRevision($lastReleasedRevision);

    /**
     * Get LastReleasedRevision.
     *
     * @return \KmbDomain\Model\RevisionInterface
     */
    public function getLastReleasedRevision();

    /**
     * Set ReleasedRevisions.
     *
     * @param \KmbDomain\Model\RevisionInterface[] $releasedRevisions
     * @return Environment
     */
    public function setReleasedRevisions($releasedRevisions);

    /**
     * Get ReleasedRevisions.
     *
     * @return \KmbDomain\Model\RevisionInterface[]
     */
    public function getReleasedRevisions();

    /**
     * Set AutoUpdatedModules.
     *
     * @param array $autoUpdatedModules
     * @return EnvironmentInterface
     */
    public function setAutoUpdatedModules($autoUpdatedModules);

    /**
     * @param string $moduleName
     * @param string $branch
     * @return EnvironmentInterface
     */
    public function addAutoUpdatedModule($moduleName, $branch);

    /**
     * @param string $moduleName
     * @return EnvironmentInterface
     */
    public function removeAutoUpdatedModule($moduleName);

    /**
     * Get AutoUpdatedModules.
     *
     * @return array
     */
    public function getAutoUpdatedModules();

    /**
     * @return boolean
     */
    public function hasAutoUpdatedModules();

    /**
     * @param string $moduleName
     * @param string $branch
     * @return boolean
     */
    public function isModuleAutoUpdated($moduleName, $branch);

    /**
     * @return string
     */
    public function __toString();
}

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
namespace KmbDomain\Service;

use GtnPersistBase\Model\RepositoryInterface;
use KmbDomain\Model\EnvironmentInterface;
use KmbDomain\Model\UserInterface;

interface EnvironmentRepositoryInterface extends RepositoryInterface
{
    /**
     * @return EnvironmentInterface[]
     */
    public function getAllRoots();

    /**
     * @return EnvironmentInterface
     */
    public function getDefault();

    /**
     * @param string $name
     * @return EnvironmentInterface
     */
    public function getRootByName($name);

    /**
     * @param string $name
     * @return EnvironmentInterface
     */
    public function getByNormalizedName($name);

    /**
     * @param EnvironmentInterface $environment
     * @return EnvironmentInterface[]
     */
    public function getAllChildren(EnvironmentInterface $environment);

    /**
     * @param EnvironmentInterface $environment
     * @return EnvironmentInterface
     */
    public function getParent(EnvironmentInterface $environment);

    /**
     * @param UserInterface $user
     * @return EnvironmentInterface[]
     */
    public function getAllForUser(UserInterface $user);

    /**
     * @param string $moduleName
     * @param string $branch
     * @return EnvironmentInterface[]
     */
    public function getAllWhereModuleIsAutoUpdated($moduleName, $branch);
}

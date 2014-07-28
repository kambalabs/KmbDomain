<?php
/**
 * @copyright Copyright (c) 2014 Orange Applications for Business
 * @link      http://github.com/kambalabs for the sources repositories
 *
 * This file is part of KmbDomain.
 *
 * KmbDomain is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * KmbDomain is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with KmbDomain.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace KmbDomainTest\Infrastructure\Memory;

use GtnPersistBase\Infrastructure\Memory;
use KmbDomain\Model\EnvironmentInterface;
use KmbDomain\Model\UserInterface;
use KmbDomain\Model\UserRepositoryInterface;

class UserRepository extends Memory\Repository implements UserRepositoryInterface
{
    /**
     * @param string $login
     * @return UserInterface
     */
    public function getByLogin($login)
    {
    }

    /**
     * @return array
     */
    public function getAllNonRoot()
    {
    }

    /**
     * @param EnvironmentInterface $environment
     * @return array
     */
    public function getAllByEnvironment($environment)
    {
    }

    /**
     * @param EnvironmentInterface $environment
     * @return array
     */
    public function getAllAvailableForEnvironment($environment)
    {
    }
}

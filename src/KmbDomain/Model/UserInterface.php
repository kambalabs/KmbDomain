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

use ZfcRbac\Identity\IdentityInterface;

interface UserInterface extends IdentityInterface
{
    /**
     * Set Id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id);

    /**
     * Get Id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set Login.
     *
     * @param string $login
     * @return UserInterface
     */
    public function setLogin($login);

    /**
     * Get Login.
     *
     * @return string
     */
    public function getLogin();

    /**
     * Set Name.
     *
     * @param string $name
     * @return UserInterface
     */
    public function setName($name);

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set Email.
     *
     * @param string $email
     * @return UserInterface
     */
    public function setEmail($email);

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Roles.
     *
     * @param \Rbac\Role\RoleInterface[]|\string[] $roles
     * @return UserInterface
     */
    public function setRoles($roles);

    /**
     * @param \Rbac\Role\RoleInterface|\string $role
     * @return UserInterface
     */
    public function addRole($role);

    /**
     * Get the list of roles of this identity
     *
     * @return string[]|\Rbac\Role\RoleInterface[]
     */
    public function getRoles();
}

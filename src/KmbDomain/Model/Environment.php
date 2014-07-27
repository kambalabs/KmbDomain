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

use Zend\Stdlib\ArrayUtils;

class Environment implements EnvironmentInterface
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $normalizedName;

    /** @var Environment */
    protected $parent;

    /** @var array */
    protected $children;

    /** @var array */
    protected $users;

    /**
     * @param int $id
     * @return Environment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return Environment
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get NormalizedName.
     *
     * @return string
     */
    public function getNormalizedName()
    {
        if ($this->normalizedName === null) {
            $this->normalizedName = implode('_', $this->getAncestorsNames());
        }
        return $this->normalizedName;
    }

    /**
     * Get all ancestors names.
     * It includes the name of the object itself.
     *
     * @return array
     */
    public function getAncestorsNames()
    {
        $names = [];
        if ($this->hasParent()) {
            $names = $this->getParent()->getAncestorsNames();
        }
        $names[] = $this->getName();
        return $names;
    }

    /**
     * Set Parent.
     *
     * @param Environment $parent
     * @return Environment
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get Parent.
     *
     * @return Environment
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return bool
     */
    public function hasParent()
    {
        return $this->getParent() !== null;
    }

    /**
     * @param Environment $environment
     * @return bool
     */
    public function isAncestorOf($environment)
    {
        if ($environment === null || !$environment->hasParent()) {
            return false;
        }
        return $this->getId() === $environment->getParent()->getId() || $this->isAncestorOf($environment->getParent());
    }

    /**
     * Set Children.
     *
     * @param array $children
     * @return Environment
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @param Environment $child
     * @return Environment
     */
    public function addChild($child)
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * Get Children.
     *
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {
        $children = $this->getChildren();
        return !empty($children);
    }

    /**
     * @param $name
     * @return bool
     */
    public function hasChildWithName($name)
    {
        if ($this->hasChildren()) {
            foreach ($this->getChildren() as $child) {
                /** @var Environment $child */
                if ($child->getName() === $name) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Set Users.
     *
     * @param array $users
     * @return EnvironmentInterface
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @param array $users
     * @return EnvironmentInterface
     */
    public function addUsers($users)
    {
        $this->users = ArrayUtils::merge($this->users, $users);
        return $this;
    }

    /**
     * Get Users.
     *
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return bool
     */
    public function hasUsers()
    {
        return count($this->users) > 0;
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function hasUser($user)
    {
        if ($this->hasUsers()) {
            foreach ($this->users as $currentUser) {
                /** @var UserInterface $currentUser */
                if ($currentUser->getId() === $user->getId()) {
                    return true;
                }
            }
        }
        return false;
    }
}

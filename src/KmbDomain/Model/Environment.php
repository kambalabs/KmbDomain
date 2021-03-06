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

    /** @var Environment[] */
    protected $children;

    /** @var UserInterface[] */
    protected $users;

    /** @var bool */
    protected $default;

    /** @var RevisionInterface */
    protected $currentRevision;

    /** @var RevisionInterface */
    protected $lastReleasedRevision;

    /** @var RevisionInterface[] */
    protected $releasedRevisions;

    /** @var  array */
    protected $autoUpdatedModules;

    /**
     * @param string $name
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

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
     * @param EnvironmentInterface $parent
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
     * @return EnvironmentInterface
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
     * @param EnvironmentInterface $environment
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
     * Get all descendants.
     *
     * @return EnvironmentInterface[]
     */
    public function getDescendants()
    {
        $descendants = [];
        if ($this->hasChildren()) {
            foreach ($this->getChildren() as $child) {
                $childDescendants = $child->hasChildren() ? $child->getDescendants() : [];
                $descendants = ArrayUtils::merge($descendants, ArrayUtils::merge([$child], $childDescendants));
            }
        }
        return $descendants;
    }

    /**
     * @param $name
     * @return EnvironmentInterface
     */
    public function getDescendantByNormalizedName($name)
    {
        if ($this->getName() === $name) {
            return $this;
        }
        $names = explode('_', $name);
        array_shift($names);
        if (empty($names)) {
            return null;
        }
        $child = $this->getChildByName($names[0]);
        if ($child == null) {
            return null;
        }
        return $child->getDescendantByNormalizedName(implode('_', $names));
    }

    /**
     * Set Children.
     *
     * @param EnvironmentInterface[] $children
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
     * @return EnvironmentInterface[]
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
     * @return EnvironmentInterface
     */
    public function getChildByName($name)
    {
        if ($this->hasChildren()) {
            foreach ($this->getChildren() as $child) {
                /** @var Environment $child */
                if ($child->getName() === $name) {
                    return $child;
                }
            }
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public function hasChildWithName($name)
    {
        return $this->getChildByName($name) != null;
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
        $this->users = array_values(array_unique($this->users));
        return $this;
    }

    /**
     * @param int $userId
     * @return EnvironmentInterface
     */
    public function removeUserById($userId)
    {
        if ($this->hasUsers()) {
            foreach ($this->users as $index => $currentUser) {
                /** @var UserInterface $currentUser */
                if ($currentUser->getId() == $userId) {
                    unset($this->users[$index]);
                    $this->users = array_values($this->users);
                    break;
                }
            }
        }
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
                if ($currentUser->getId() == $user->getId()) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param bool $default
     * @return Environment
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * Set CurrentRevision.
     *
     * @param \KmbDomain\Model\RevisionInterface $currentRevision
     * @return Environment
     */
    public function setCurrentRevision($currentRevision)
    {
        $this->currentRevision = $currentRevision;
        return $this;
    }

    /**
     * Get CurrentRevision.
     *
     * @return \KmbDomain\Model\RevisionInterface
     */
    public function getCurrentRevision()
    {
        return $this->currentRevision;
    }

    /**
     * Set LastReleasedRevision.
     *
     * @param \KmbDomain\Model\RevisionInterface $lastReleasedRevision
     * @return Environment
     */
    public function setLastReleasedRevision($lastReleasedRevision)
    {
        $this->lastReleasedRevision = $lastReleasedRevision;
        return $this;
    }

    /**
     * Get LastReleasedRevision.
     *
     * @return \KmbDomain\Model\RevisionInterface
     */
    public function getLastReleasedRevision()
    {
        return $this->lastReleasedRevision;
    }

    /**
     * Set ReleasedRevisions.
     *
     * @param \KmbDomain\Model\RevisionInterface[] $releasedRevisions
     * @return Environment
     */
    public function setReleasedRevisions($releasedRevisions)
    {
        $this->releasedRevisions = $releasedRevisions;
        return $this;
    }

    /**
     * Get ReleasedRevisions.
     *
     * @return \KmbDomain\Model\RevisionInterface[]
     */
    public function getReleasedRevisions()
    {
        return $this->releasedRevisions;
    }

    /**
     * Set AutoUpdatedModules.
     *
     * @param array $autoUpdatedModules
     * @return Environment
     */
    public function setAutoUpdatedModules($autoUpdatedModules)
    {
        $this->autoUpdatedModules = $autoUpdatedModules;
        return $this;
    }

    /**
     * @param string $moduleName
     * @param string $branch
     * @return Environment
     */
    public function addAutoUpdatedModule($moduleName, $branch)
    {
        $this->autoUpdatedModules[$moduleName] = $branch;
        return $this;
    }

    /**
     * @param string $moduleName
     * @return Environment
     */
    public function removeAutoUpdatedModule($moduleName)
    {
        unset($this->autoUpdatedModules[$moduleName]);
        return $this;
    }

    /**
     * Get AutoUpdatedModules.
     *
     * @return array
     */
    public function getAutoUpdatedModules()
    {
        return $this->autoUpdatedModules;
    }

    /**
     * @return boolean
     */
    public function hasAutoUpdatedModules()
    {
        return !empty($this->autoUpdatedModules);
    }

    /**
     * @param string $moduleName
     * @param string $branch
     * @return boolean
     */
    public function isModuleAutoUpdated($moduleName, $branch)
    {
        return isset($this->autoUpdatedModules[$moduleName]) && $this->autoUpdatedModules[$moduleName] === $branch;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNormalizedName();
    }

    public function __clone()
    {
        if ($this->hasChildren()) {
            $this->setChildren(array_map(function ($child) {
                return clone $child;
            }, $this->getChildren()));
        }
        $this->setId(null);
        $this->setParent(null);
        $this->setDefault(false);
    }
}

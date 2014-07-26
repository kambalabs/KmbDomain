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
use GtnPersistZendDb\Model\AggregateRootProxyInterface;

class EnvironmentProxy implements EnvironmentInterface, AggregateRootProxyInterface
{
    /** @var Environment */
    protected $aggregateRoot;

    /** @var EnvironmentRepositoryInterface */
    protected $environmentRepository;

    /** @var EnvironmentProxy */
    protected $parent;

    /** @var array */
    protected $children;

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return AggregateRootProxyInterface
     */
    public function setAggregateRoot(AggregateRootInterface $aggregateRoot)
    {
        $this->aggregateRoot = $aggregateRoot;
        return $this;
    }

    /**
     * return AggregateRootInterface
     */
    public function getAggregateRoot()
    {
        return $this->aggregateRoot;
    }

    /**
     * Set EnvironmentRepository.
     *
     * @param \KmbDomain\Model\EnvironmentRepositoryInterface $environmentRepository
     * @return EnvironmentProxy
     */
    public function setEnvironmentRepository($environmentRepository)
    {
        $this->environmentRepository = $environmentRepository;
        return $this;
    }

    /**
     * Get EnvironmentRepository.
     *
     * @return \KmbDomain\Model\EnvironmentRepositoryInterface
     */
    public function getEnvironmentRepository()
    {
        return $this->environmentRepository;
    }

    /**
     * @param int $id
     * @return EnvironmentProxy
     */
    public function setId($id)
    {
        $this->aggregateRoot->setId($id);
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->aggregateRoot->getId();
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return EnvironmentProxy
     */
    public function setName($name)
    {
        $this->aggregateRoot->setName($name);
        return $this;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->aggregateRoot->getName();
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
     * Get NormalizedName.
     *
     * @return string
     */
    public function getNormalizedName()
    {
        return implode('_', $this->getAncestorsNames());
    }

    /**
     * Set Parent.
     *
     * @param \KmbDomain\Model\EnvironmentInterface $parent
     * @return EnvironmentProxy
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get Parent.
     *
     * @return \KmbDomain\Model\EnvironmentInterface
     */
    public function getParent()
    {
        if ($this->parent === null) {
            $this->setParent($this->environmentRepository->getParent($this));
        }
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
     * @param \KmbDomain\Model\EnvironmentInterface $environment
     * @return bool
     */
    public function isAncestorOf($environment)
    {
        return $this->aggregateRoot->isAncestorOf($environment);
    }

    /**
     * Set Children.
     *
     * @param array $children
     * @return EnvironmentProxy
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @param EnvironmentInterface $child
     * @return EnvironmentProxy
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
        if ($this->children === null) {
            $this->setChildren($this->environmentRepository->getAllChildren($this));
        }
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
                /** @var EnvironmentInterface $child */
                if ($child->getName() === $name) {
                    return true;
                }
            }
        }
        return false;
    }
}

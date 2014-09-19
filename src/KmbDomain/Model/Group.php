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

class Group implements GroupInterface
{
    /** @var int */
    protected $id;

    /** @var Revision */
    protected $revision;

    /** @var Environment */
    protected $environment;

    /** @var string */
    protected $name;

    /** @var string */
    protected $includePattern;

    /** @var string */
    protected $excludePattern;

    /** @var int */
    protected $ordering;

    /** @var PuppetClass[] */
    protected $classes;

    /**
     * @param string $name
     */
    public function __construct($name = null)
    {
        $this->setName($name);
    }

    /**
     * Set Id.
     *
     * @param int $id
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Revision.
     *
     * @param \KmbDomain\Model\Revision $revision
     * @return Group
     */
    public function setRevision($revision)
    {
        $this->revision = $revision;
        return $this;
    }

    /**
     * Get Revision.
     *
     * @return \KmbDomain\Model\Revision
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * Set Environment.
     *
     * @param \KmbDomain\Model\Environment $environment
     * @return Group
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * Get Environment.
     *
     * @return \KmbDomain\Model\Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return Group
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
     * Set IncludePattern.
     *
     * @param string $includePattern
     * @return Group
     */
    public function setIncludePattern($includePattern)
    {
        $this->includePattern = $includePattern;
        return $this;
    }

    /**
     * Get IncludePattern.
     *
     * @return string
     */
    public function getIncludePattern()
    {
        return $this->includePattern;
    }

    /**
     * Set ExcludePattern.
     *
     * @param string $excludePattern
     * @return Group
     */
    public function setExcludePattern($excludePattern)
    {
        $this->excludePattern = $excludePattern;
        return $this;
    }

    /**
     * Get ExcludePattern.
     *
     * @return string
     */
    public function getExcludePattern()
    {
        return $this->excludePattern;
    }

    /**
     * Set Ordering.
     *
     * @param int $ordering
     * @return Group
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * Get Ordering.
     *
     * @return int
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set Classes.
     *
     * @param \KmbDomain\Model\PuppetClass[] $classes
     * @return Group
     */
    public function setClasses($classes)
    {
        $this->classes = $classes;
        return $this;
    }

    /**
     * Get Classes.
     *
     * @return \KmbDomain\Model\PuppetClass[]
     */
    public function getClasses()
    {
        return $this->classes;
    }
}

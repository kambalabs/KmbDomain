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

class Revision implements RevisionInterface
{
    /** @var int */
    protected $id;

    /** @var EnvironmentInterface */
    protected $environment;

    /** @var \DateTime */
    protected $releasedAt;

    /** @var  string */
    protected $releasedBy;

    /** @var  RevisionLogInterface[] */
    protected $logs;

    /** @var string */
    protected $comment;

    /** @var GroupInterface[] */
    protected $groups;

    /**
     * @param EnvironmentInterface $environment
     */
    public function __construct($environment = null)
    {
        $this->setEnvironment($environment);
    }

    /**
     * Set Id.
     *
     * @param int $id
     * @return Revision
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
     * Set Environment.
     *
     * @param \KmbDomain\Model\EnvironmentInterface $environment
     * @return Revision
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * Get Environment.
     *
     * @return \KmbDomain\Model\EnvironmentInterface
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set ReleasedAt.
     *
     * @param \DateTime $releasedAt
     * @return Revision
     */
    public function setReleasedAt($releasedAt)
    {
        $this->releasedAt = $releasedAt;
        return $this;
    }

    /**
     * Get ReleasedAt.
     *
     * @return \DateTime
     */
    public function getReleasedAt()
    {
        return $this->releasedAt;
    }

    /**
     * @return bool
     */
    public function isReleased()
    {
        return $this->releasedAt !== null;
    }

    /**
     * Set ReleasedBy.
     *
     * @param string $releasedBy
     * @return Revision
     */
    public function setReleasedBy($releasedBy)
    {
        $this->releasedBy = $releasedBy;
        return $this;
    }

    /**
     * Get ReleasedBy.
     *
     * @return string
     */
    public function getReleasedBy()
    {
        return $this->releasedBy;
    }

    /**
     * Set Comment.
     *
     * @param string $comment
     * @return Revision
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Get Comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set Logs.
     *
     * @param \KmbDomain\Model\RevisionLogInterface[] $logs
     * @return Revision
     */
    public function setLogs($logs)
    {
        $this->logs = $logs;
        return $this;
    }

    /**
     * Add specified log.
     *
     * @param \KmbDomain\Model\RevisionLogInterface $log
     * @return Revision
     */
    public function addLog($log)
    {
        $this->logs[] = $log;
        return $this;
    }

    /**
     * Get Logs.
     *
     * @return \KmbDomain\Model\RevisionLogInterface[]
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * Get most recent log.
     *
     * @return RevisionLogInterface
     */
    public function getLastLog()
    {
        if ($this->hasLogs()) {
            return $this->logs[0];
        }
    }

    /**
     * @return bool
     */
    public function hasLogs()
    {
        return !empty($this->logs);
    }

    /**
     * Set Groups.
     *
     * @param \KmbDomain\Model\GroupInterface[] $groups
     * @return Revision
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * Add a group.
     *
     * @param \KmbDomain\Model\GroupInterface $group
     * @return Revision
     */
    public function addGroup($group)
    {
        $this->groups[] = $group;
        return $this;
    }

    /**
     * Get Groups.
     *
     * @return \KmbDomain\Model\GroupInterface[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param string $name
     * @return GroupInterface
     */
    public function getGroupByName($name)
    {
        if ($this->hasGroups()) {
            foreach ($this->groups as $group) {
                if ($group->getName() === $name) {
                    return $group;
                }
            }
        }
    }

    /**
     * @return bool
     */
    public function hasGroups()
    {
        return count($this->groups) > 0;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasGroupWithName($name)
    {
        return $this->getGroupByName($name) !== null;
    }

    /**
     * @param string $hostname
     * @return GroupInterface[]
     */
    public function getGroupsMatchingHostname($hostname)
    {
        $groups = [];
        if ($this->hasGroups()) {
            foreach ($this->getGroups() as $group) {
                if ($group->matchesForHostname($hostname)) {
                    $groups[] = $group;
                }
            }
        }
        return $groups;
    }

    public function __clone()
    {
        if ($this->hasGroups()) {
            $this->setGroups(array_map(function ($group) {
                return clone $group;
            }, $this->getGroups()));
        }
        $this->setId(null);
        $this->setComment(null);
        $this->setReleasedAt(null);
        $this->setReleasedBy(null);
        $this->setLogs([]);
    }
}

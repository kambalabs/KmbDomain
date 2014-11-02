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

class RevisionLog implements RevisionLogInterface
{
    /** @var  int */
    protected $id;

    /** @var  RevisionInterface */
    protected $revision;

    /** @var  \DateTime */
    protected $createdAt;

    /** @var  string */
    protected $createdBy;

    /** @var  string */
    protected $comment;

    /**
     * @param \DateTime $createdAt
     * @param string    $createdBy
     * @param string    $comment
     */
    public function __construct($createdAt = null, $createdBy = null, $comment = null)
    {
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->comment = $comment;
    }

    /**
     * Set Id.
     *
     * @param int $id
     * @return RevisionLog
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
     * @param \KmbDomain\Model\RevisionInterface $revision
     * @return RevisionLog
     */
    public function setRevision($revision)
    {
        $this->revision = $revision;
        return $this;
    }

    /**
     * Get Revision.
     *
     * @return \KmbDomain\Model\RevisionInterface
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * Set CreatedAt.
     *
     * @param \DateTime $createdAt
     * @return RevisionLog
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get CreatedAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set CreatedBy.
     *
     * @param string $createdBy
     * @return RevisionLog
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get CreatedBy.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set Comment.
     *
     * @param string $comment
     * @return RevisionLog
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
}

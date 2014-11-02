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

use GtnPersistBase\Model\EntityInterface;

interface RevisionLogInterface extends EntityInterface
{
    /**
     * Set Revision.
     *
     * @param \KmbDomain\Model\RevisionInterface $revision
     * @return RevisionLogInterface
     */
    public function setRevision($revision);

    /**
     * Get Revision.
     *
     * @return \KmbDomain\Model\RevisionInterface
     */
    public function getRevision();

    /**
     * Set CreatedAt.
     *
     * @param \DateTime $createdAt
     * @return RevisionLogInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get CreatedAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Set CreatedBy.
     *
     * @param string $createdBy
     * @return RevisionLogInterface
     */
    public function setCreatedBy($createdBy);

    /**
     * Get CreatedBy.
     *
     * @return string
     */
    public function getCreatedBy();

    /**
     * Set Comment.
     *
     * @param string $comment
     * @return RevisionLogInterface
     */
    public function setComment($comment);

    /**
     * Get Comment.
     *
     * @return string
     */
    public function getComment();
}

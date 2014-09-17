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

interface RevisionInterface extends AggregateRootInterface
{
    /**
     * Set Environment.
     *
     * @param \KmbDomain\Model\EnvironmentInterface $environment
     * @return Revision
     */
    public function setEnvironment($environment);

    /**
     * Get Environment.
     *
     * @return \KmbDomain\Model\EnvironmentInterface
     */
    public function getEnvironment();

    /**
     * Set UpdatedAt.
     *
     * @param \DateTime $updatedAt
     * @return Revision
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get UpdatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * Set UpdatedBy.
     *
     * @param string $updatedBy
     * @return Revision
     */
    public function setUpdatedBy($updatedBy);

    /**
     * Get UpdatedBy.
     *
     * @return string
     */
    public function getUpdatedBy();

    /**
     * Set ReleasedAt.
     *
     * @param \DateTime $releasedAt
     * @return Revision
     */
    public function setReleasedAt($releasedAt);

    /**
     * Get ReleasedAt.
     *
     * @return \DateTime
     */
    public function getReleasedAt();

    /**
     * Set ReleasedBy.
     *
     * @param string $releasedBy
     * @return Revision
     */
    public function setReleasedBy($releasedBy);

    /**
     * Get ReleasedBy.
     *
     * @return string
     */
    public function getReleasedBy();

    /**
     * Set Comment.
     *
     * @param string $comment
     * @return Revision
     */
    public function setComment($comment);

    /**
     * Get Comment.
     *
     * @return string
     */
    public function getComment();
}

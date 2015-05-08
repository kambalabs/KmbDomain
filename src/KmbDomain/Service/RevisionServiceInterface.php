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
namespace KmbDomain\Service;

use KmbDomain\Model\RevisionInterface;
use KmbDomain\Model\UserInterface;

interface RevisionServiceInterface
{
    /**
     * Release specified revision.
     * If the revision had already been released, the current revision should be removed first.
     *
     * @param RevisionInterface $revision
     * @param UserInterface     $user
     * @param string            $comment
     * @return RevisionServiceInterface
     */
    public function release(RevisionInterface $revision, UserInterface $user, $comment);

    /**
     * Remove specified revision.
     * If it's the current revision, another current revision should be recreate from last released revision.
     *
     * @param RevisionInterface $revision
     * @return RevisionServiceInterface
     */
    public function remove(RevisionInterface $revision);
}

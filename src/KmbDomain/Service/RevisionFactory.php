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

use KmbDomain\Model\Revision;

class RevisionFactory implements RevisionFactoryInterface
{
    /** @var  GroupFactory */
    protected $groupFactory;

    /**
     * Create Revision instance from imported data.
     *
     * @param array  $data
     * @return Revision
     */
    public function createFromImportedData($data)
    {
        $revision = new Revision();
        $revision->setReleasedAt(new \DateTime($data['released_at']));
        $revision->setReleasedBy($data['released_by']);
        $revision->setComment($data['comment']);
        foreach ($data['groups'] as $groupData) {
            $revision->addGroup($this->getGroupFactory()->createFromImportedData($groupData));
        }
        return $revision;
    }

    /**
     * Set GroupFactory.
     *
     * @param \KmbDomain\Service\GroupFactory $groupFactory
     * @return RevisionFactory
     */
    public function setGroupFactory($groupFactory)
    {
        $this->groupFactory = $groupFactory;
        return $this;
    }

    /**
     * Get GroupFactory.
     *
     * @return \KmbDomain\Service\GroupFactory
     */
    public function getGroupFactory()
    {
        if ($this->groupFactory == null) {
            $this->setGroupFactory(new GroupFactory());
        }
        return $this->groupFactory;
    }
}

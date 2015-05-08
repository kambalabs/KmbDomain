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

use KmbDomain\Model\Group;

class GroupFactory implements GroupFactoryInterface
{
    /** @var  GroupClassFactory */
    protected $groupClassFactory;

    /**
     * Create Group instance from imported data.
     *
     * @param array  $data
     * @return Group
     */
    public function createFromImportedData($data)
    {
        $group = new Group($data['name'], $data['include_pattern'], $data['exclude_pattern']);
        if (isset($data['type'])) {
            $group->setType($data['type']);
        }
        $group->setOrdering($data['ordering']);
        foreach ($data['classes'] as $className => $classData) {
            $group->addClass($this->getGroupClassFactory()->createFromImportedData($className, $classData));
        }
        return $group;
    }

    /**
     * Set GroupClassFactory.
     *
     * @param \KmbDomain\Service\GroupClassFactory $groupClassFactory
     * @return GroupFactory
     */
    public function setGroupClassFactory($groupClassFactory)
    {
        $this->groupClassFactory = $groupClassFactory;
        return $this;
    }

    /**
     * Get GroupClassFactory.
     *
     * @return \KmbDomain\Service\GroupClassFactory
     */
    public function getGroupClassFactory()
    {
        if ($this->groupClassFactory == null) {
            $this->setGroupClassFactory(new GroupClassFactory());
        }
        return $this->groupClassFactory;
    }
}

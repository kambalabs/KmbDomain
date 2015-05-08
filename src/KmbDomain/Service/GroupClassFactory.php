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

use KmbDomain\Model\GroupClass;

class GroupClassFactory implements GroupClassFactoryInterface
{
    /** @var  GroupParameterFactory */
    protected $groupParameterFactory;

    /**
     * Create GroupClass instance from imported data.
     *
     * @param string $name
     * @param array  $data
     * @return GroupClass
     */
    public function createFromImportedData($name, $data)
    {
        $class = new GroupClass($name);
        foreach ($data as $parameterName => $parameterData) {
            $class->addParameter($this->getGroupParameterFactory()->createFromImportedData($parameterName, $parameterData));
        }
        return $class;
    }

    /**
     * Set GroupParameterFactory.
     *
     * @param \KmbDomain\Service\GroupParameterFactory $groupParameterFactory
     * @return GroupClassFactory
     */
    public function setGroupParameterFactory($groupParameterFactory)
    {
        $this->groupParameterFactory = $groupParameterFactory;
        return $this;
    }

    /**
     * Get GroupParameterFactory.
     *
     * @return \KmbDomain\Service\GroupParameterFactory
     */
    public function getGroupParameterFactory()
    {
        if ($this->groupParameterFactory == null) {
            $this->setGroupParameterFactory(new GroupParameterFactory());
        }
        return $this->groupParameterFactory;
    }
}

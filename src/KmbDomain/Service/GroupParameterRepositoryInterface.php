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

use GtnPersistBase\Model\RepositoryInterface;
use KmbDomain\Model\GroupClassInterface;
use KmbDomain\Model\GroupParameterInterface;

interface GroupParameterRepositoryInterface extends RepositoryInterface
{
    /**
     * @param GroupClassInterface $class
     * @return GroupParameterInterface[]
     */
    public function getAllByClass($class);

    /**
     * @param GroupParameterInterface $parent
     * @return GroupParameterInterface[]
     */
    public function getAllByParent($parent);

    /**
     * @param GroupParameterInterface $child
     * @return GroupParameterInterface
     */
    public function getByChild($child);
}

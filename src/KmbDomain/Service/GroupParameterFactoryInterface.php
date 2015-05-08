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

use KmbDomain\Model\GroupParameterInterface;

interface GroupParameterFactoryInterface
{
    /**
     * Create GroupParameter instance from imported data.
     *
     * @param string $name
     * @param array $data
     * @return GroupParameterInterface
     */
    public function createFromImportedData($name, $data);

    /**
     * Create GroupParameter instances from all given required templates.
     *
     * @param \stdClass[] $templates
     * @return GroupParameterInterface[]
     */
    public function createRequiredFromTemplates($templates);

    /**
     * Create GroupParameter instance from given template.
     *
     * @param \stdClass $template
     * @return GroupParameterInterface
     */
    public function createFromTemplate($template);
}

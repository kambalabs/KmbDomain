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

use KmbDomain\Model\GroupParameter;
use KmbDomain\Model\GroupParameterType;

class GroupParameterFactory implements GroupParameterFactoryInterface
{
    /**
     * Create GroupParameter instance from imported data.
     *
     * @param string $name
     * @param array  $data
     * @return GroupParameter
     */
    public function createFromImportedData($name, $data)
    {
        if (!is_array($data)) {
            return new GroupParameter($name, [$data]);
        } elseif (!$this->isAssociativeArray($data)) {
            return new GroupParameter($name, $data);
        }
        $parameter = new GroupParameter($name);
        foreach ($data as $childName => $childData) {
            $parameter->addChild($this->createFromImportedData($childName, $childData));
        }
        return $parameter;
    }

    protected function isAssociativeArray($data)
    {
        return array_keys($data) !== range(0, count($data) - 1);
    }

    /**
     * Create GroupParameter instances from all given required templates.
     *
     * @param \stdClass[] $templates
     * @return GroupParameter[]
     */
    public function createRequiredFromTemplates($templates)
    {
        $parameters = [];
        if (!empty($templates)) {
            foreach ($templates as $template) {
                if ($template->required) {
                    $parameters[] = $this->createFromTemplate($template);
                }
            }
        }
        return $parameters;
    }

    /**
     * Create GroupParameter instance from given template.
     *
     * @param \stdClass $template
     * @return GroupParameter
     */
    public function createFromTemplate($template)
    {
        $parameter = new GroupParameter();
        $parameter->setName($template->name);
        $parameter->setTemplate($template);
        if ($template->type == GroupParameterType::HASHTABLE && isset($template->entries)) {
            $parameter->setChildren($this->createRequiredFromTemplates($template->entries));
        } elseif ($template->type != GroupParameterType::HASHTABLE && $template->type != GroupParameterType::EDITABLE_HASHTABLE) {
            if ($template->type == GroupParameterType::BOOLEAN) {
                $value = true;
            } else {
                $value = empty($template->values) ? '' : $template->values[0];
            }
            $parameter->addValue($value);
        }
        return $parameter;
    }
}

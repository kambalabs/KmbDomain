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

class ParameterFactory implements ParameterFactoryInterface
{
    /**
     * Create Parameters instances from all given required templates.
     *
     * @param \stdClass[] $templates
     * @return Parameter[]
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
     * Create Parameter instance from given template.
     *
     * @param \stdClass $template
     * @return Parameter
     */
    public function createFromTemplate($template)
    {
        $parameter = new Parameter();
        $parameter->setName($template->name);
        $parameter->setTemplate($template);
        if ($template->type == ParameterType::HASHTABLE && isset($template->entries)) {
            $parameter->setChildren($this->createRequiredFromTemplates($template->entries));
        } elseif ($template->type != ParameterType::HASHTABLE && $template->type != ParameterType::EDITABLE_HASHTABLE) {
            if ($template->type == ParameterType::BOOLEAN) {
                $value = true;
            } else {
                $value = empty($template->values) ? '' : $template->values[0];
            }
            $parameter->addValue($value);
        }
        return $parameter;
    }
}

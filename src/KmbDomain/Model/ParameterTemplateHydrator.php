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

class ParameterTemplateHydrator implements ParameterTemplateHydratorInterface
{
    /**
     * Hydrate $parameter with the provided $template.
     *
     * @param  \stdClass          $template
     * @param  ParameterInterface $parameter
     * @return ParameterInterface
     */
    public function hydrate($template, $parameter)
    {
        if ($template->type == ParameterType::EDITABLE_HASHTABLE) {
            $parameter->setTemplate($template);
            if ($parameter->hasChildren()) {
                foreach ($parameter->getChildren() as $child) {
                    $this->hydrateRecursively($template, $child);
                }
            }
        } else {
            $this->hydrateRecursively($template, $parameter);
        }
    }

    /**
     * @param \stdClass          $template
     * @param ParameterInterface $parameter
     */
    protected function hydrateRecursively($template, $parameter)
    {
        $parameter->setTemplate($template);
        if (!empty($template->entries) && ($template->type == ParameterType::EDITABLE_HASHTABLE || $template->type == ParameterType::HASHTABLE)) {
            $availableChildren = array_filter($template->entries, function ($entry) use ($parameter) {
                return !$parameter->hasChildWithName($entry->name);
            });
            foreach ($template->entries as $entry) {
                $child = $parameter->getChildByName($entry->name);
                if ($child != null) {
                    $this->hydrate($entry, $child);
                    $child->setAvailableSiblings(array_values($availableChildren));
                }
            }
        } elseif (!empty($template->values) && ($template->type == ParameterType::PREDEFINED_LIST || $template->type == ParameterType::EDITABLE_LIST)) {
            $availableValues = array_filter($template->values, function ($value) use ($parameter) {
                return !$parameter->hasValueWithName($value);
            });
            $parameter->setAvailableValues(array_values($availableValues));
        }
    }
}

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

class ClassTemplatesHydrator implements ClassTemplatesHydratorInterface
{
    /** @var  ParameterTemplateHydratorInterface */
    protected $parameterTemplateHydrator;

    /**
     * Hydrate $class with the provided $templates.
     *
     * @param  \stdClass[]          $templates
     * @param  PuppetClassInterface $class
     * @return PuppetClass
     */
    public function hydrate($templates, $class)
    {
        $availableParameters = array_filter($templates, function ($template) use ($class) {
            return !$class->hasParameterWithName($template->name);
        });
        foreach ($templates as $template) {
            $parameter = $class->getParameterByName($template->name);
            if ($parameter != null) {
                $this->parameterTemplateHydrator->hydrate($template, $parameter);
                $parameter->setAvailableSiblings(array_values($availableParameters));
            }
        }
    }

    /**
     * Set ParameterTemplateHydrator.
     *
     * @param \KmbDomain\Model\ParameterTemplateHydratorInterface $parameterTemplateHydrator
     * @return ClassTemplatesHydrator
     */
    public function setParameterTemplateHydrator($parameterTemplateHydrator)
    {
        $this->parameterTemplateHydrator = $parameterTemplateHydrator;
        return $this;
    }

    /**
     * Get ParameterTemplateHydrator.
     *
     * @return \KmbDomain\Model\ParameterTemplateHydratorInterface
     */
    public function getParameterTemplateHydrator()
    {
        return $this->parameterTemplateHydrator;
    }
}

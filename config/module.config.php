<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbDomain\Model\ParameterFactory' => 'KmbDomain\Model\ParameterFactory',
            'KmbDomain\Model\ParameterTemplateHydrator' => 'KmbDomain\Model\ParameterTemplateHydrator',
        ],
        'factories' => [
            'KmbDomain\Model\ClassTemplatesHydrator' => 'KmbDomain\Service\ClassTemplatesHydratorFactory',
        ],
        'aliases' => [
            'parameterFactory' => 'KmbDomain\Model\ParameterFactory',
            'classTemplatesHydrator' => 'KmbDomain\Model\ClassTemplatesHydrator',
            'parameterTemplateHydrator' => 'KmbDomain\Model\ParameterTemplateHydrator',
        ],
    ],
];

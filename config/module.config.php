<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbDomain\Model\GroupParameterFactory' => 'KmbDomain\Model\GroupParameterFactory',
            'KmbDomain\Model\ParameterTemplateHydrator' => 'KmbDomain\Model\ParameterTemplateHydrator',
        ],
        'factories' => [
            'KmbDomain\Model\ClassTemplatesHydrator' => 'KmbDomain\Service\ClassTemplatesHydratorFactory',
        ],
        'aliases' => [
            'groupParameterFactory' => 'KmbDomain\Model\GroupParameterFactory',
            'classTemplatesHydrator' => 'KmbDomain\Model\ClassTemplatesHydrator',
            'parameterTemplateHydrator' => 'KmbDomain\Model\ParameterTemplateHydrator',
        ],
    ],
];

<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbDomain\Model\PuppetClassFactory' => 'KmbDomain\Model\PuppetClassFactory',
            'KmbDomain\Model\ParameterTemplateHydrator' => 'KmbDomain\Model\ParameterTemplateHydrator',
        ],
        'factories' => [
            'KmbDomain\Model\ClassTemplatesHydrator' => 'KmbDomain\Service\ClassTemplatesHydratorFactory',
        ],
        'aliases' => [
            'puppetClassFactory' => 'KmbDomain\Model\PuppetClassFactory',
            'classTemplatesHydrator' => 'KmbDomain\Model\ClassTemplatesHydrator',
            'parameterTemplateHydrator' => 'KmbDomain\Model\ParameterTemplateHydrator',
        ],
    ],
];

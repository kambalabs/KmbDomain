<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbDomain\Service\GroupParameterFactory' => 'KmbDomain\Service\GroupParameterFactory',
            'KmbDomain\Service\GroupClassFactory' => 'KmbDomain\Service\GroupClassFactory',
            'KmbDomain\Service\GroupFactory' => 'KmbDomain\Service\GroupFactory',
            'KmbDomain\Service\RevisionFactory' => 'KmbDomain\Service\RevisionFactory',
        ],
        'aliases' => [
            'groupParameterFactory' => 'KmbDomain\Service\GroupParameterFactory',
            'groupClassFactory' => 'KmbDomain\Service\GroupClassFactory',
            'groupFactory' => 'KmbDomain\Service\GroupFactory',
            'revisionFactory' => 'KmbDomain\Service\RevisionFactory',
        ],
    ],
];

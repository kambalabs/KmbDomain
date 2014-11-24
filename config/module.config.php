<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbDomain\Model\GroupParameterFactory' => 'KmbDomain\Model\GroupParameterFactory',
            'KmbDomain\Model\GroupClassFactory' => 'KmbDomain\Model\GroupClassFactory',
            'KmbDomain\Model\GroupFactory' => 'KmbDomain\Model\GroupFactory',
            'KmbDomain\Model\RevisionFactory' => 'KmbDomain\Model\RevisionFactory',
        ],
        'aliases' => [
            'groupParameterFactory' => 'KmbDomain\Model\GroupParameterFactory',
            'groupClassFactory' => 'KmbDomain\Model\GroupClassFactory',
            'groupFactory' => 'KmbDomain\Model\GroupFactory',
            'revisionFactory' => 'KmbDomain\Model\RevisionFactory',
        ],
    ],
];

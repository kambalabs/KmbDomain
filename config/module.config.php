<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbDomain\Model\GroupParameterFactory' => 'KmbDomain\Model\GroupParameterFactory',
        ],
        'aliases' => [
            'groupParameterFactory' => 'KmbDomain\Model\GroupParameterFactory',
        ],
    ],
];

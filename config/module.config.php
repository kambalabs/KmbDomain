<?php
return [
    'service_manager' => [
        'invokables' => [
            'KmbDomain\Model\PuppetClassFactory' => 'KmbDomain\Model\PuppetClassFactory',
        ],
        'aliases' => [
            'puppetClassFactory' => 'KmbDomain\Model\PuppetClassFactory',
        ],
    ],
];

<?php
return [
    'service_manager' => [
        'invokables' => [
            'EnvironmentRepository' => 'KmbDomainTest\Infrastructure\Memory\EnvironmentRepository',
            'UserRepository' => 'KmbDomainTest\Infrastructure\Memory\UserRepository',
        ],
    ],
];

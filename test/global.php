<?php
return [
    'service_manager' => [
        'factories' => [
            'UserRepository' => function () {
                    return PHPUnit_Framework_MockObject_Generator::getMock('KmbDomain\Service\UserRepositoryInterface');
                },
            'EnvironmentRepository' => function () {
                    return PHPUnit_Framework_MockObject_Generator::getMock('KmbDomain\Service\EnvironmentRepositoryInterface');
                },
        ],
    ],
];

<?php
return [
    'service_manager' => [
        'factories' => [
            'UserRepository' => function () {
                    return PHPUnit_Framework_MockObject_Generator::getMock('KmbDomain\Model\UserRepositoryInterface');
                },
            'EnvironmentRepository' => function () {
                    return PHPUnit_Framework_MockObject_Generator::getMock('KmbDomain\Model\EnvironmentRepositoryInterface');
                },
        ],
    ],
];

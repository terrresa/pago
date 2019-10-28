<?php

return [

    'db' => [

        'charset' => 'utf8',
        'database' => 'test',
        'driver' => 'PDO_mysql',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        
        
//        'adapters' => [
//            'db1' => [
//                'charset' => 'utf8',
//                'database' => 'test',
//                'driver' => 'PDO_mysql',
//                'hostname' => 'localhost',
//                'username' => 'root',
//                'password' => '',
//            ],
//        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            'Zend\Db\Adapter\AdapterAbstractServiceFactory',
        ],
        'factories' => [
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ],
    ],
];



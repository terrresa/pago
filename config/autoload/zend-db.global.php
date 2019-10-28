<?php

return [

    'db' => [

        /**
         * Esta conexión es la que se usa por defecto, es decir cuando llames al namespace:
         *      Zend\Db\Adapter\Adapter
         * Se usará esta conexión
         * Ejemplos de uso:
         *
         *  Desde un Controllador:
         *
         *      $this->getEvent()->getApplication()->getServiceManager()->get("Zend\Db\Adapter\Adapter");
         *
         *  Desde un Factory
         *
         *      $adapter = $container->get("Zend\Db\Adapter\Adapter");
         *
         */
        'charset' => 'utf8',
        'database' => 'test',
        'driver' => 'PDO_mysql',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',

        /**
         * La sección de adapters se usa para multiples bases de datos, cada elemento de adapters se
         * convierte en un service por lo cual se puede jalar desde el service manager
         *
         * Ejemplos de uso:
         *
         *  Desde un Controllador:
         *
         *      $this->getEvent()->getApplication()->getServiceManager()->get("db1");
         *
         *  Desde un Factory
         *
         *      $adapter = $container->get("db1");
         *
         *
         */
        'adapters' => [
            'db1' => [
                'charset' => 'utf8',
                'database' => 'test',
                'driver' => 'PDO_mysql',
                'hostname' => 'localhost',
                'username' => 'root',
                'password' => '',
            ],
        ],
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



<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
            'demo' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
            'prueba' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/prueba/',
                    'defaults' => [
                        'controller' => Controller\PruebaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'prueba_url' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/prueba/demo[/:action]',
                    'defaults' => [
                        'controller' => Controller\PruebaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
            'prueba_ele' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/nueva[/:id/:id2]',
                    'defaults' => [
                        'controller' => Controller\PruebaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
           
            'get-form' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/get-form-data',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'get-form-data',
                    ],
                ],
            ],
            
            
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\PruebaController::class =>  InvokableFactory::class,//
            // Controller\Factory\IndexControllerFactory::class
        ],
    ],
   
    
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    
     'service_manager' => [
        'factories' => [
            Repository\MarcaRepository::class => Repository\Factory\MarcaRepositoryFactory::class,
            Repository\ProductoRepository::class => Repository\Factory\ProductoRepositoryFactory::class,
            Repository\ClienteRepository::class => Repository\Factory\ClienteRepositoryFactory::class,
            Repository\ColorRepository::class => Repository\Factory\ColorRepositoryFactory::class
        ]
    ]
];

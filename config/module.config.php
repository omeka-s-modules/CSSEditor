<?php
  
return [
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH.'/modules/CSSEditor/view',
        ],
    ],
    'controllers' => [
        'invokables' => [
            'CssEditor\Controller\Admin\Index' => 'CssEditor\Controller\Admin\IndexController',
        ],
    ],
    'navigation' => [
        'site' => [
            [
                'label' => 'CSS Editor', // @translate
                'route' => 'admin/site/slug/csseditor/default',
                'action' => 'index',
                'useRouteMatch' => true.
                'pages' => [
                    [
                        'route' => 'admin/site/slug/csseditor/default',                      
                        'visible' => false,
                    ],
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'site' => [
                        'child_routes' => [
                            'slug' => [
                                'child_routes' => [
                                    'csseditor' => [
                                        'type' => 'Literal',
                                        'options' => [
                                            'route' => '/csseditor',
                                            'defaults' => [
                                                '__NAMESPACE__' => 'CssEditor\Controller\Admin',
                                                'controller' => 'index',
                                                'action' => 'index',
                                            ],
                                        ],
                                        'may_terminate' => true,
                                        'child_routes' => [ 
                                            'default' => [
                                                'type' => 'Segment',
                                                'options' => [
                                                    'route' => '/:action',
                                                    'constraints' => [
                                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];

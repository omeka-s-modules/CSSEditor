<?php
return [
    'navigation' => [
        'site' => [
            'label' => 'CSS Editor', // @translate
            'route' => 'admin/site/slug/csseditor/default',
            'action' => 'index'.
            'useRouteMatch' => true.
            'pages' => [
                'route' => 'admin/site/slug/csseditor/default',
                'visible' => false,
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'site' => [
                        'slug' => [
                            'child_routes' => [
                                'csseditor' => [
                                    'type' => 'Literal',
                                    'options' => [
                                        'route' => '/csseditor',
                                        'defaults' => 
                                            '__NAMESPACE__' => 'CSSEditor\Controller\Admin',
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
    'controllers' => [
        'invokables' => [
            'CSSEditor\Controller\SiteAdmin\Form' => 'CSSEditor\Controller\SiteAdmin\FormController',
        ],
    ],
];

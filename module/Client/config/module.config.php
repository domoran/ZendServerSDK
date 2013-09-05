<?php
return array (
        'controllers' => array (
                'invokables' => array (
                        'webapi-zpk-controller' => 'Client\Controller\ZpkController',
                        'webapi-app-controller' => 'Client\Controller\AppController',
                        'webapi-api-controller' => 'Client\Controller\ApiController',
                        'webapi-lib-controller' => 'Client\Controller\LibController',
                )
        ),
        'console' => array (
                'router' => array (
                        'routes' => array (
                            'installApp' => array (
                                'options' => array (
                                    'route' => 'installApp --zpk= --baseUri= [--userParams=] [--userAppName=] [--target=] [--zsurl=] [--zskey=] [--zssecret=]',
                                    'defaults' => array (
                                        'controller' => 'webapi-app-controller',
                                        'action' => 'install'
                                    ),
                                    'info' => array (
                                        'This command installs or updates an application',
                                        array('--zpk', 'The zpk package file'),
                                        array('--baseUri','The baseUri of where the application will be installed'),
                                        array('--userParams', 'User parameters that have to formated as a query string'),
                                        array('--userAppName', 'Name of the application'),
                                        array('--target', 'The unique name of the target'),
                                        array('--zsurl','The Zend Server URL. If not specified then it will be http://localhost:10081'),
                                        array('--zskey', 'The name of the API key'),
                                        array('--zssecret', 'The hash of the API key'),
                                    ),
                                    'arrays' => array (
                                        'userParams',
                                    ),
                                    'files' => array (
                                        'zpk',
                                    )
                                )
                            ),
                            'createZpk' => array(
                                'options' => array (
                                    'route' => 'createZpk [--folder=]',
                                    'defaults' => array (
                                        'controller' => 'webapi-zpk-controller',
                                        'action' => 'create',
                                        'folder' => '.',
                                    ),
                                    'info' => array(
                                        'Adds ZPK support to existing PHP project',
                                        array('folder','Folder where the source code is located')
                                    ),
                                    'files' => array(
                                        'folder'
                                    ),
                                    'no-target' => true,
                                ),
                            ),
                            'packZpk'   => array(
                                'options' => array (
                                    'route' => 'packZpk [--folder=] [--destination=] [--name=]  [--composer]',
                                    'defaults' => array (
                                        'controller' => 'webapi-zpk-controller',
                                        'action' => 'pack',
                                        'folder' => '.',
                                        'destination' => '.',
                                    ),
                                    'info' => array(
                                          'Creates a ZPK package from PHP project with ZPK support',
                                          array('folder','Folder where the source code is located'),
                                          array('destination','Folder in which to save the created ZPK file'),
                                          array('name','The name of the package. If not provided the name will be constructed from the name of the application and its version.'),
                                          array('composer','Enables rudimentary composer support.')
                                    ),
                                    'files' => array(
                                        'folder', 'destination'
                                    ),
                                    'no-target' => true,
                                ),
                            )
                        ),
                )

        ),

        'service_manager' => array (
            'invokables' => array (
                'zpk'  => 'Client\Service\ZpkInvokable',
                'path' => 'Client\Service\PathInvokable',
                'composer' => 'Client\Service\ComposerInvokable',
             )
        ),
);

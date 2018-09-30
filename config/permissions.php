<?php
return [
    'Users.SimpleRbac.permissions' => [
        [
            'role' => 'user',
            'controller' => 'Videos',
            'action' => ['subeTuVideoDeMisterio', 'misVideos', 'sitemap', 'misterio'],
        ],
        [
            'role' => 'admin',
            'controller' => 'Videos',
            'action' => [''],
        ],
        [
            'role' => 'admin',
            'controller' => 'Encuentas',
            'action' => [''],
        ],
        [
            'role' => 'admin',
            'plugin' => 'CakeDC/Users',
            'controller' => 'Users',
            'action' => [''],
        ],
        [
            'role' => 'user',
            'plugin' => 'CakeDC/Users',
            'controller' => 'Users',
            'action' => ['logout'],
        ],
    ]
];
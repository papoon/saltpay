<?php

return
[
    'paths' => [
        'migrations' => 'db/migrations',
        'seeds' => 'db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => strtolower(getenv('ENV')),
        'dev' => [
            'adapter' => 'mysql',
            'host' => 'db',
            'name' => getenv('DB'),
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASSWORD'),
            'port' => '3306',
            'charset' => 'utf8',
        ],
    ],
    'version_order' => 'creation'
];
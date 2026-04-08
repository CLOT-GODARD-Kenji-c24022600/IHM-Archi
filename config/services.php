<?php

declare(strict_types=1);

return [
    'services' => [
        'plats_utilisateurs' => 'http://localhost:3003',
        'menus' => 'http://localhost:3004',
        'commandes' => 'http://localhost:3005',
    ],
    'http_timeout' => 3,
    'fail_soft' => true,
];

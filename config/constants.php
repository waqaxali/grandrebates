<?php

return [
    'app_name' => 'Grandrebates',
    'per_page' => '2',
    'delete' => '2',
    'is_active' => '1',
    'status' => [
        'is_active' => 1,
        'dactive' => 0,

    ],

    'stores' => [
        // 'use_network' => 1,
        // 'use_skimlinks' => 1,
        'commission' => 1,
        'network_flat_switch_active' => 1,
        'network_flat_switch_dactive' => 0,
        'skimlinks_flat_rate_active' => 1,
        'skimlinks_flat_rate_dactive' => 0,
    ],
    'network_type' => [
        'network' => 1,
        'skimlinks' => 2,
    ],
    'user' => [
        'premium' => 2,
        
    ],
];

<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cms' => $baseDir . '/plugins/Cms/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Duplicatable' => $baseDir . '/vendor/riesenia/cakephp-duplicatable/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];

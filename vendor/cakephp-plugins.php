<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cms' => $baseDir . '/plugins/Cms/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Estudante' => $baseDir . '/plugins/Estudante/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];

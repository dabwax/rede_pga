<?php
use Cake\Routing\Router;

Router::plugin('Estudante', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});

<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// UltraAI Chat API
$routes->post('api/chat', 'Chat::send');

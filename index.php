<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('catalog', 'DefaultController');
Routing::get('news', 'DefaultController');
Routing::get('beer', 'DefaultController');
Routing::post('login', 'SecurityController');

Routing::run($path);
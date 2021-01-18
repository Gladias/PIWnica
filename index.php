<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('catalog', 'DefaultController');
Routing::get('news', 'DefaultController');
Routing::get('beer', 'DefaultController');
Routing::get('start', 'DefaultController');

Routing::get('beers', 'BeerController');
Routing::post('addBeer', 'BeerController');
Routing::post('search', 'BeerController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');

Routing::run($path);
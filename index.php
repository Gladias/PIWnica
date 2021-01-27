<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('logout', "SecurityController");

Routing::get('catalog', 'BeerController');
Routing::get('beer', 'BeerController');
Routing::get('beers', 'BeerController');
Routing::post('addBeer', 'BeerController');
Routing::post('addComment', 'BeerController');
Routing::post('deleteComment', 'BeerController');
Routing::post('search', 'BeerController');
Routing::post('bestBeersSearch', 'BeerController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');

Routing::run($path);
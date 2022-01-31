<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('index', 'DefaultController');
Router::get('registration', 'DefaultController');
Router::get('map_view', 'CruiseController');
Router::get('notifications', 'DefaultController');
Router::get('cruise_description', 'DefaultController');
Router::get('requests', 'DefaultController');
Router::get('user_profile', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');
Router::post('addCruise', 'CruiseController');
Router::post('search', 'CruiseController');
Router::post('searchStartDate', 'CruiseController');
Router::run($path);
<?php

require 'Routing.php';

session_start();
if(!isset($_SESSION['ident'])){
    $_SESSION['ident']=$_SERVER['REMOTE_ADDR'].DATE('Y. t');
    $_SESSION['logon']=0;
}
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('index', 'DefaultController');
Router::get('registration', 'DefaultController');
Router::get('map_view', 'CruiseController');
Router::get('notifications', 'DefaultController');
Router::get('cruise_description', 'CruiseController');
Router::get('requests', 'DefaultController');
Router::get('user_profile', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');
Router::post('addCruise', 'CruiseController');
Router::post('search', 'CruiseController');
Router::post('searchStartDate', 'CruiseController');
Router::run($path);
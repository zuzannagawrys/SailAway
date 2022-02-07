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
Router::get('logout', 'SecurityController');
Router::get('index', 'DefaultController');
Router::get('registration', 'DefaultController');
Router::get('map_view', 'CruiseController');
Router::get('notifications', 'NotificationController');
Router::get('cruise_description', 'CruiseController');
Router::get('requests', 'RequestController');
Router::get('user_profile', 'UserController');
Router::get('applyForCruise', 'CruiseController');
Router::get('requestAccepted', 'RequestController');
Router::get('requestDenied', 'RequestController');
Router::get('removeNotification', 'NotificationController');
Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');
Router::post('addCruise', 'CruiseController');
Router::post('search', 'CruiseController');
Router::post('searchNumberOfDays', 'CruiseController');
Router::post('editImage', 'UserController');
Router::run($path);
<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }
    public function login()
    {
        $this->render('login');
    }

    public function registration()
    {
        $this->render('registration');
    }

    public function notifications()
    {
        $this->render('notifications');
    }
    public function requests()
    {
        $this->render('requests');
    }
    public function cruise_description()
    {
        $this->render('cruise_description');
    }
    public function user_profile()
    {
        $this->render('user_profile');
    }



}
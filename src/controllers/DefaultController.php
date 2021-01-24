<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function index() {
        // TODO: display main page
        $this->render('start');
    }

    public function register() {
        $this->render('register');
    }

    public function login() {
        $this->render('login');
    }

    public function catalog() {
        $this->render('catalog');
    }

    public function news() {
        $this->render('news');
    }

    public function search() {
        $this->render('search');
    }

    public function start() {
        $this->render('start');
    }
}
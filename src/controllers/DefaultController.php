<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function index() {
        $this->render('search');
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

    public function search() {
        $this->render('search');
    }
}
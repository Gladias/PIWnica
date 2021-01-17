<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function index() {
        // TODO: display main page
        $this->render('login');
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

    public function beer() {
        $this->render('beer');
    }

    public function search() {
        $this->render('search');
    }
}
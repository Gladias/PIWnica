<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{

    public function login() {
        $user = new User("test", "test@email.com", "test");

        if($this->isPost()) {
            return $this->login('login');
        }

        $login = $_POST["login"];
        $password = $_POST["password"];

        if ($user->getLogin() !== $login) {
            return $this->render('login', ['messages' => ['User with this login does not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/register");
    }
}
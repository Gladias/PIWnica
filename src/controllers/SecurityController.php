<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    public function login() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST["login"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($login);

        if (!$user or $user->getLogin() !== $login) {
            return $this->render('login', ['messages' => ['Użytkownik nie istnieje!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Złe hasło!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/register");
    }
}
<?php

session_start();

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST["login"];
        $password =  $_POST["password"];

        $user = $userRepository->getUser($login);

        if (!$user) {
            return $this->render('login', ['messages' => ['Taki użytkownik nie istnieje']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Hasło nieprawidłowe']]);
        }

        $_SESSION["login"] = $user->getLogin();
        $_SESSION["role"] = $user->getRole();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/beers");
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['repeat_password'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Podane hasła nie są identyczne']]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->render('register', ['messages' => ['Podany email jest błędny']]);
        }

        if ($this->userRepository->getUser($login)) {
            return $this->render('register', ['messages' => ['Podany login jest już zajęty']]);
        }

        # TODO: Email not available

        $user = new User($login, $email, password_hash($password, PASSWORD_BCRYPT));
        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['Rejestracja przebiegła pomyślnie']]);
    }

    public function logout() {
        session_unset();
        session_destroy();

        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/start");

        return $this->render('login', ['messages' => ['Zostałeś wylogowany']]);
    }
}
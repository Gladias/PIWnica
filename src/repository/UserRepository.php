<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $login): ?User
    {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE login = :login
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['login'],
            $user['email'],
            $user['password'],
        );
    }

    public function addUser(User $user) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (login, email, password)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getLogin(),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }
}
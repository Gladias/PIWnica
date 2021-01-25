<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $login, $returnId=false)
    {
        $statement = $this->database->connect()->prepare('
            SELECT users.id AS user_id, users.login, users.email, users.role_id, roles.name, roles.description
            FROM users JOIN roles ON users.role_id=roles.id WHERE login = :login
        ');
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            return null;
        }

        if ($returnId) {
            return $result['user_id'];
        }

        return new User(
            $result['login'],
            $result['email'],
            $result['password'],
            $result['name']
        );
    }

    public function addUser(User $user) {
        $get_role_id = $this->database->connect()->prepare('
            SELECT * FROM roles WHERE name = :name
        ');

        $role_name = $user->getRole();
        $get_role_id->bindParam(':id', $role_name, PDO::PARAM_STR);
        $get_role_id->execute();

        $role = $get_role_id->fetch(PDO::FETCH_ASSOC);


        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (login, email, password, role_id)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getLogin(),
            $user->getEmail(),
            $user->getPassword(),
            $role['id']
        ]);
    }
}
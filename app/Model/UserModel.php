<?php


namespace App\Model;

use App\Service\DB;

class UserModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = DB::get();
    }

    public function auth(string $login, string $password)
    {
        $stmt = $this->pdo->prepare("
                SELECT
                    *
                FROM
                    `users`
                WHERE
                    `login` = :login AND `password` = :password
            ");

        $stmt->execute([
           ':login' => $login,
           ':password' => $password
        ]);

        $result = $stmt->fetch();

        if ($result) {
            $_SESSION['auth'] = $result;
            header('Location: /');
        }
    }

    public function getUsers()
    {
        $stmt = $this->pdo->prepare("
            SELECT
                *
            FROM
                `users`
        ");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO
                `users` (
                    `email`,
                    `login`,
                    `password`
                ) VALUES (
                    :email,
                    :login,
                    :password
                )
        ");
        $stmt->execute([
            ':email' => $data['email'],
            ':login' => $data['login'],
            ':password' => sha1($data['password'])
        ]);

    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                *
            FROM
                `users`
            WHERE
                `id` = :id
        ");
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch();
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE
                `users`
            SET
                `login` = :login,
                `email` = :email,
                `password` = :password
            WHERE
                `id` = :id
        ");

        $stmt->execute([
            ':login' => $data['login'],
            ':email' => $data['email'],
            ':password' => sha1($data['password']),
            ':id' => $id, 
        ]);
    }

    public function delete($id)
    {

        $stmt = $this->pdo->prepare("
            DELETE FROM
                `users`
            WHERE
                `id` = :id
        ");
        $stmt->execute([
            ':id' => $id
        ]);
    }
}
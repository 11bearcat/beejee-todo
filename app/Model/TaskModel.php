<?php


namespace App\Model;


use App\Service\DB;

class TaskModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = DB::get();
    }

    public function getTasks($offset, $sizePage, $orderColumn = 'id', $orderBy = 'ASC')
    {
        $stmt = $this->pdo->prepare("
            SELECT
                *
            FROM
                `tasks`
            ORDER BY ${orderColumn} ${orderBy}
            LIMIT
                ${offset},
                ${sizePage}
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getTaskById($id)
    {
        $pdo = DB::get();
        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                `tasks`
            WHERE
                `id` = :id
        ");

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch();
    }

    public function create(Array $data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO
                `tasks` (
                    `title`,
                    `description`,
                    `email`
                ) VALUES (
                    :title,
                    :description,
                    :email
                )
        ");

        $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':email' => $data['email']
        ]);

    
        return $stmt;
    }

    public function update($id, $data) 
    {
        $stmt = $this->pdo->prepare("
                UPDATE
                    `tasks`
                SET
                    `title` = :title,
                    `description` = :description,
                    `email` = :email,
                    `status` = :status
                WHERE
                    `id` = :id
            ");

        $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':email' => $data['email'],
            ':status' => isset($data['status']) ? 1 : 0,
            ':id' => $id,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM
                `tasks`
            WHERE
                `id` = :id
        ");
        $stmt->execute([
            ':id' => $id
        ]);
    }
    
    public function count()
    {
        $stmt = $this->pdo->prepare("
            SELECT
                COUNT(*)
            FROM
                `tasks` 
        ");

        $stmt->execute();

        return ceil($stmt->fetch()['COUNT(*)'] / 3);
    }
}
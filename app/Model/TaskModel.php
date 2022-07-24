<?php

namespace App\Model;

use App\Service\DB;
use PDO;
use PDOStatement;

/**
 * Class TaskModel
 * @package App\Model
 */
class TaskModel
{

    /**
     * @var PDO|null
     */
    private ?PDO $pdo;

    /**
     * TaskModel constructor.
     */
    public function __construct()
    {
        $this->pdo = DB::get();
    }

    /**
     * @param $offset
     * @param $sizePage
     * @param  string  $orderColumn
     * @param  string  $orderBy
     *
     * @return array
     */
    public function getTasks($offset, $sizePage, $orderColumn = 'id', $orderBy = 'ASC'): array
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

    /**
     * @param $id
     *
     * @return mixed
     */
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

    /**
     * @param  array  $data
     *
     * @return false|PDOStatement
     */
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

    /**
     * @param $id
     * @param $data
     */
    public function update($id, $data)
    {
        $currentTask = $this->getTaskById($id);
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

        if ($currentTask['description'] != $data['description']) {
            $this->pdo->prepare("
                UPDATE
                    `tasks`
                SET
                    `edited` = :edited
                WHERE
                    `id` = :id
            ")->execute([
                ':edited' => 1,
                ':id' => $id
            ]);
        }
    }

    /**
     * @param $id
     */
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

    /**
     * @return false|float
     */
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
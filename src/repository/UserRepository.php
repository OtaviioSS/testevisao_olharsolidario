<?php

namespace src\repository;
require __DIR__ .'/../../vendor/autoload.php';

use PDO;
use src\config\Connection;
use Exception;
use src\Model\User;



class UserRepository
{

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertUser(User $user)

    {

        try {
            $this->connection->beginTransaction();

            $stmt =  $this->connection->prepare("INSERT INTO tb_user (email, user_password, nome) VALUES (?, ?, ?)");

            $stmt->bindValue(1, $user->getEmail());

            $stmt->bindValue(2, $user->getPassword());

            $stmt->bindValue(3, $user->getNome());

            $stmt->execute();

            return $this->connection->commit();
        } catch (Exception $exception) {
            var_dump($exception);
            return $exception;
        }
    }

    public function getUserForEmail($email): bool|Exception|\PDOStatement
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tb_user WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt;
        } catch (Exception $exception) {
            return $exception;
        }
    }
    public function getUserByID($id): bool|Exception|\PDOStatement
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tb_user WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt;
        } catch (Exception $exception) {
            return $exception;
        }
    }


    public function deleteUser($id): bool|Exception|\PDOStatement
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM tb_user WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt;
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function getCouRowsFromEmail($email)
    {

        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM tb_user WHERE email = ?");
        $stmt->execute([$email]);
        $cout = $stmt->fetchColumn();
        return $cout;
    }

    public function updateUser(User $user)
    {
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare("UPDATE tb_user SET email = ?, nome = ? WHERE  id = ?");
            $stmt->bindValue(1, $user->getEmail());
            $stmt->bindValue(2, $user->getNome());
            $stmt->bindValue(3, $user->getIdUser());
            $stmt->execute();
            return $this->connection->commit();
        } catch (Exception $exception) {
            echo $exception;
            var_dump($exception);
            return $exception;
        }
    }

    public function updateUserPassword($userId, $newPassword): Exception|bool
    {
        try {
            $this->connection->beginTransaction();

            $stmt = $this->connection->prepare("UPDATE tb_user SET user_password = ? WHERE id = ?");
            $stmt->bindValue(1, $newPassword);
            $stmt->bindValue(2, $userId);
            $stmt->execute();

            return $this->connection->commit();
        } catch (Exception $exception) {
            var_dump($exception);
            return $exception;
        }
    }
    public function updateUserToken($userId, $token): Exception|bool
    {
        try {
            $this->connection->beginTransaction();

            $stmt = $this->connection->prepare("UPDATE tb_user SET user_token = ? WHERE id = ?");
            $stmt->bindValue(1, $token);
            $stmt->bindValue(2, $userId);
            $stmt->execute();

            return $this->connection->commit();
        } catch (Exception $exception) {
            var_dump($exception);
            return $exception;
        }
    }

    public function getUserByToken($token)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tb_user WHERE user_token = ?");
            $stmt->bindValue(1, $token);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            throw new Exception("Erro ao buscar usuário: " . $exception->getMessage());
        }
    }
}

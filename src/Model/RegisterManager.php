<?php

namespace App\Model;

use PDO;

class RegisterManager extends AbstractManager
{
    public const TABLE = 'user';

    /**
     * Insert new user in database
     */
    public function insert(array $user): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`user_name`, `pseudo`,
        `email`, `password`, `adress`, `zip_code`, `city`)
        VALUES (:user_name, :pseudo, :email, :password, :adress, :zip_code, :city)");
        $statement->bindValue('user_name', $user['user_name'], PDO::PARAM_STR);
        $statement->bindValue('pseudo', $user['pseudo'], PDO::PARAM_STR);
        $statement->bindValue('email', $user['email'], PDO::PARAM_STR);
        $statement->bindValue(':password', password_hash($user['password'], PASSWORD_DEFAULT));
        $statement->bindValue('adress', $user['adress'], PDO::PARAM_STR);
        $statement->bindValue('zip_code', $user['zip_code'], PDO::PARAM_INT);
        $statement->bindValue('city', $user['city'], PDO::PARAM_INT);


        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    public function update(array $item): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item['id'], PDO::PARAM_INT);
        $statement->bindValue('title', $item['title'], PDO::PARAM_STR);

        return $statement->execute();
    }
}

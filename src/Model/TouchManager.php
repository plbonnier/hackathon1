<?php

namespace App\Model;

use PDO;

class TouchManager extends AbstractManager
{
    public const TABLE = "user";

    public function getTotalUserInBdd(): int
    {
        $statement = $this->pdo->query("SELECT COUNT(*) as total FROM " . static::TABLE);
        $totalUserInBdd = $statement->fetch(PDO::FETCH_ASSOC);

        return $totalUserInBdd['total'] ?? 0;
    }

    public function selectRandomUser(): ?array
    {
        $totalUsers = $this->getTotalUserInBdd();

        if ($totalUsers > 0) {
            $randomId = random_int(1, $totalUsers);

            $statement = $this->pdo->prepare("SELECT * FROM " .
            static::TABLE . " WHERE id=:id ORDER BY RAND() LIMIT 1");
            $statement->bindValue('id', $randomId, PDO::PARAM_INT);
            $statement->execute();

            return $statement->fetch();
        } else {
            return null;
        }
    }
}

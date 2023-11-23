<?php

namespace App\Model;

use PDO;

class TouchManager extends AbstractManager
{
    public const TABLE = "user";

    public function touchById($id): array|false
    {
        $sql = "SELECT id,pseudo FROM " . self::TABLE .
            " WHERE id=:id ORDER BY RAND() LIMIT 1";
        $query = $this->pdo->prepare($sql);
        $query->bindValue('id', $id, (PDO::PARAM_INT));

        $query->execute();
        return $query->fetch();
    }
}

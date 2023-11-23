<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class ChooseManager extends AbstractManager
{
    protected PDO $pdo;

    public const TABLE = 'gift';

    public function selectOneByGift(string $gift): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " ORDER BY RAND() LIMIT 1");
        $statement->bindValue('id', $gift, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}

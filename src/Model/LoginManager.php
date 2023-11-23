<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class LoginManager extends AbstractManager
{
    public const TABLE = 'user';

    public function selectOneByPseudo(string $pseudo): array|false
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE pseudo=:pseudo");
        $statement->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
}

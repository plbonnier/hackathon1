<?php

namespace App\Model;

use App\Model\AbstractManager;
use PDO;

class GiftManager extends AbstractManager
{
    protected PDO $pdo;

    public const TABLE = 'gift';

    public function getTotalGiftsInBdd(): int
    {
        $statement = $this->pdo->query("SELECT COUNT(*) as total FROM " . static::TABLE);
        $totalGiftInBdd = $statement->fetch(PDO::FETCH_ASSOC);

        return $totalGiftInBdd['total'] ?? 0;
    }

    public function selectRandomGift(): ?array
    {
        $totalGifts = $this->getTotalGiftsInBdd();

        if ($totalGifts > 0) {
            $randomId = random_int(1, $totalGifts);

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

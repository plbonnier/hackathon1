<?php

namespace App\Controller;

use App\Model\GiftManager;
use App\Model\LoginManager;
use App\Model\TouchManager;

class GiftController extends AbstractController
{
    public function chooseGift(): string
    {
        if (!isset($_SESSION['user'])) {
            $giftManager = new GiftManager();
            $randomGift = $giftManager->selectRandomGift();
            $touchManager = new TouchManager();
            $toucher = $touchManager->selectRandomUser();

            return $this->twig->render('Gift/gift.html.twig', ['gift' => $randomGift,
            'toucher' => $toucher]);
        } else {
            header('Location:/login');
            exit();
        }
    }
}

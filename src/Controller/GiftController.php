<?php

namespace App\Controller;

use App\Model\GiftManager;

class GiftController extends AbstractController
{
    public function chooseGift(): string
    {
        $giftManager = new GiftManager();
        $randomGift = $giftManager->selectRandomGift();

        return $this->twig->render('Gift/gift.html.twig', ['gift' => $randomGift]);
    }
}

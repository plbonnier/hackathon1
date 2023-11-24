<?php

namespace App\Controller;

use App\Model\TouchManager;
use App\Model\LoginManager;
use App\Model\ChooseManager;

class TouchController extends AbstractController
{
    /**
     * Display home page
     */
    public function touch(): string
    {
        if (!isset($_SESSION['user'])) {
            $touchManager = new TouchManager();
            $toucher = $touchManager->selectRandomUser();
            return $this->twig->render('Touch/touch.html.twig', ['toucher' => $toucher]);
        } else {
            header('Location:/login');
            exit();
        }
    }
}

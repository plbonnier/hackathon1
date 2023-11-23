<?php

namespace App\Controller;

use App\Model\TouchManager;

class TouchController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(int $id): string
    {
        $touchManager = new TouchManager();
        $toucher = $touchManager->selectRandomById($id);
        return $this->twig->render('Home/touch.html.twig', ['toucher' => $toucher]);
    }
}

<?php

namespace App\Controller;

use App\Model\TouchManager;

class TouchController extends AbstractController
{
    /**
     * Display home page
     */
    public function touch(int $id): string
    {
        $touchManager = new TouchManager();
        $toucher = $touchManager->touchById($id);
        return $this->twig->render('Touch/touch.html.twig', ['toucher' => $toucher]);
    }
}

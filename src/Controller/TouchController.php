<?php

namespace App\Controller;

class TouchController extends AbstractController
{
    /**
     * Display home page
     */
    public function touch(): string
    {
        return $this->twig->render('Touch/touch.html.twig');
    }
}

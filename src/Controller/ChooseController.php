<?php

namespace App\Controller;

class ChooseController extends AbstractController
{
    /**
     * Display home page
     */
    public function choose(): string
    {
        return $this->twig->render('Choose/index.html.twig');
    }
}

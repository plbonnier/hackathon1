<?php

namespace App\Controller;

use App\Model\RegisterManager;
use App\Service\ValidationService;

class RegisterController extends AbstractController
{
    /**
     * Display home page
     */
    public function register()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $user = array_map('trim', $_POST);
            $errorsValidation = new ValidationService();
            $errorsValidation->formValidationUser($user);
            $errorsValidation->formValidationUser2($user);
            $errors = $errorsValidation->errors;

            if (empty($errors)) {
                // if validation is ok, insert and redirection
                $registerManager = new RegisterManager();
                $registerManager->insert($user);

                header('Location: /login');
                return null;
            }
        }
        return $this->twig->render('Register/index.html.twig', [
            'errors' => $errors
        ]);
    }
}

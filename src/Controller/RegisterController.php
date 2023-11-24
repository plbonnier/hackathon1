<?php

namespace App\Controller;

use App\Model\RegisterManager;
use App\Service\ValidationService;

class RegisterController extends AbstractController
{
    /**
     * Display home page
     */
    public function register(int $id)
    {
        if (isset($_SESSION['user_id'])) {
            header('Location:/');
            exit();
        }
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

                   header('Location: /touch?id= ' . $id);
                return null;
            }
        }
        return $this->twig->render('Register/index.html.twig', [
            'errors' => $errors
        ]);
    }
}

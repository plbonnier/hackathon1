<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\LoginManager;

class LoginController extends AbstractController
{
    /**
     *Login method
     */
    public function login()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataTrimed = array_map('trim', $_POST);
            $credentials = array_map('htmlentities', $dataTrimed);


            if (empty($credentials['pseudo'])) {
                $error = "Tu dois mettre ton pseudo";
                $errors[] = $error;
            }
            if (empty($credentials['password'])) {
                $error = "Tu dois mettre ton mot de passe";
                $errors[] = $error;
            }

            if (empty($errors)) {
                $userManager = new LoginManager();

                $user = $userManager->selectOneByPseudo($credentials['pseudo']);

                if ($user && password_verify($credentials['password'], $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    header('Location:/');
                    exit();
                } else {
                    $error = "Vérifie ton pseudo ou ton mot de passe.";
                    $errors[] = $error;
                    return $this->twig->render('Login/login.html.twig', ['errors' => $errors]);
                }
            } else {
                return $this->twig->render('Login/login.html.twig', ['errors' => $errors]);
            }
        }
        return $this->twig->render('Login/login.html.twig');
    }
}

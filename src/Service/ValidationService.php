<?php

namespace App\Service;

class ValidationService
{
    public array $errors;
    public function __construct()
    {
        $this->errors = [];
    }

    public function formValidationUser(array $user): void
    {
        if (empty($user['user_name'])) {
            $this->errors[] = "Tu veux toucher ou être touché et recevoir ton touch'cadeau? Il faut ton nom";
        }
        if (strlen($user['user_name']) > 50) {
            $this->errors[] = "Ton nom est trop long pour être touché ou pour être un toucheur";
        }
        if (empty($user['pseudo'])) {
            $this->errors[] = "Tu veux toucher ou être touché et recevoir ton touch'cadeau? Il faut ton pseudo";
        }
        if (strlen($user['pseudo']) > 50) {
            $this->errors[] = "Ton pseudo est trop long pour être touché ou pour être un toucheur";
        }
        if (strlen($user['adress']) > 255) {
            $this->errors[] =
                "Ton adresse est trop longue, tu risque de ne pas recevoir ton touch'cadeau";
        }
    }

    public function formValidationUser2(array $user): void
    {
        if (empty($user['adress'])) {
            $this->errors[] = "On ne pourra pas te toucher si on ne sait pas où tu habites";
        }
        if (empty($user['city'])) {
            $this->errors[] = "On ne pourra pas te toucher si on ne sait pas où tu habites";
        }
        if (strlen($user['city']) > 50) {
            $this->errors[] = "Le nom de la ville est trop long, tu risques de ne pas recevoir ton touch'cadeau";
        }
        if (!empty($user['zipcode']) && !preg_match('/[0-9]{5}/', $user['zipcode'])) {
            $this->errors[] = "Le CP n'est pas au bon format, tu risques de ne pas recevoir ton touch'cadeau";
        }
        if (!empty($user['email']) && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Tu veux être prévenu quand tu as été touché? donnes ton email";
        }
    }

    public function formValidationCustomer3(array $customer): void
    {
        if (!empty($customer['phone']) && !preg_match('/[0-9]{10}/', $customer['phone'])) {
            $this->errors[] = "Le numéro de téléphone n\'est pas au bon format";
        }
        if ($customer['civility'] != "Monsieur" && $customer['civility'] != "Madame") {
            $this->errors[] = "Civilité non conforme";
        }
    }

    public function userValidation(array $user): void
    {
        if (empty($user['lastname'])) {
            $this->errors[] = "Le nom est obligatoire";
        }
        if (strlen($user['lastname']) > 100) {
            $this->errors[] = "Le nom est trop long";
        }
        if (empty($user['pseudo'])) {
            $this->errors[] = "Le pseudo est obligatoire";
        }
        if (strlen($user['pseudo']) > 20) {
            $this->errors[] = "Le pseudo est trop long";
        }
    }

    public function userValidationExtra(array $user): void
    {
        if (empty($user['name'])) {
            $this->errors[] = "Le prénom est obligatoire";
        }
        if (strlen($user['name']) > 100) {
            $this->errors[] = "Le prénom est trop long";
        }
        if (empty($user['password'])) {
            $this->errors[] = "Le mot de passe est obligatoire";
        }
    }
}

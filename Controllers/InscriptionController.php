<?php

require_once '../Model/UserModel.php';


class inscriptionController
{

    public function inscription()
    {

        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = strip_tags($_POST['password']);
        $confirm = strip_tags($_POST['confirm']);

        $utilisateur = new UserModel();
        $exist = $utilisateur->findByEmail($email);

        if (!$exist) {

            if ($password == $confirm) {

                $password = password_hash($password, PASSWORD_BCRYPT);
                $insert = $utilisateur->register($nom, $prenom, $email, $password);

                $gestion_erreur = [
                    "valide" =>  array(
                        0 => '1',
                    )
                ];
            } else {

                $gestion_erreur = [
                    "error" =>  array(
                        0 => 'les mots de passe sont differents'
                    )
                ];
            }
            echo json_encode($gestion_erreur);
        } else {

            $gestion_erreur = [
                "error" =>  array(
                    0 => 'Le mail existe deja'
                )
            ];

            echo json_encode($gestion_erreur);
        }
    }
}

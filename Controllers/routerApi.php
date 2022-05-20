<?php
session_start();


require_once 'connectDb.php';
require_once 'ConnexionController.php';
require_once 'IndexController.php';
require_once 'InscriptionController.php';



if (!empty($_POST) && isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $connexion = new connexionController();
    $connexion->connexion();
}

if (
    isset($_POST['ins_nom'], $_POST['ins_prenom'], $_POST['ins_email'], $_POST['ins_password'], $_POST['ins_confirm'])
) {
    $inscription = new inscriptionController();
    $inscription->inscription();
} else {
}


if (!empty($_POST['ins_nom']) && !empty($_POST['ins_prenom']) && !empty($_POST['ins_email']) && !empty($_POST['ins_password'])) {

    $gestion_erreur = [
        "error" => array(
            0 => 'Les champs sont vides'
        )
    ];

    echo json_encode($gestion_erreur);
}

/* if (isset($_POST['search'])) {
    $search = new indexController();
    $search->methodSearch($_POST['search']);
} */

if (isset($_GET['action'])) {

    switch ($_GET['action']) {

        case 'search':
            $search = new indexController();
            $search->methodSearch($_POST['search']);
    }
}

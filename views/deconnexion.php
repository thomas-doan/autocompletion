<?php

session_start();
if (!isset($_SESSION['user'])) {

    header("Location: ./connexion.php");
}

if (isset($_SESSION['user'])) {

    unset($_SESSION['user']);
    header("Location: ./connexion.php");
}

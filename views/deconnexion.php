<?php
if (!isset($_SESSION['user'])) {

    header("Location: ./connexion.php");
} else {
    unset($_SESSION['user']);
}

<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: ./connexion.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <script type="text/javascript" src="../JS/script.js"></script>

    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>

    <header>
        <nav>
            <ul class="navigation">
                <li><a href="./index.php">Autocompletion</a></li>
                <li>
                    <a href="deconnexion.php">Deconnexion</a>
                </li>

            </ul>
        </nav>
    </header>
    <main>
        <p> Auto complétion </p>
        <?php var_dump($_SESSION['user']); ?>

        <label for="site-search">Search the site:</label>
        <input type="search" id="site-search" name="q">

        <button>Search</button>
        <ul class="firstResult"></ul>
        <ul class="secondResult"></ul>

    </main>

    <footer>
        <p> footer </p>
    </footer>

</body>

</html>
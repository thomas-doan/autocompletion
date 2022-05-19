<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="../JS/script.js"></script>

    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>

    <header>
        <nav>
            <ul class="navigation">
                <li><a href="./index.php">Index</a></li>
                <li><a href="./inscription.php">Inscription</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <section>
            <h2>connexion</h2>

            <p class="erreur"></p>

            <form action="../Controllers/ConnexionController.php" method="post" id="connexion_form">

                <input class="email" type="text" name="email" placeholder="Email" autocomplete="off">

                <input class="password" type="password" name="password" placeholder="Votre mot de passe" autocomplete="off">

                <button id="valid_connexion" type="submit">Valider</button>

            </form>
        </section>


    </main>



</body>

</html>
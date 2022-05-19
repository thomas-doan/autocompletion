<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script type="text/javascript" src="../JS/script.js"></script>
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>

    <header>
        <nav>
            <ul class="navigation">
                <li><a href="./index.php">Autocompletion</a></li>
                <li><a href="./connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <section>

            <h2>Inscription</h2>

            <p class="erreur"></p>

            <form action="" method="post" id="inscription">

                <input class="prenom" type="text" name="ins_prenom" placeholder="Prenom" autocomplete="off">

                <input class="nom" type="text" name="ins_nom" placeholder="Nom" autocomplete="off">

                <input class="email" type="text" name="ins_email" placeholder="Email" autocomplete="off">

                <input class="password" type="password" name="ins_password" placeholder="Votre mot de passe" autocomplete="off">

                <input type="password" name="ins_confirm" placeholder="Votre mot de passe" autocomplete="off">


                <button id="validation" type="submit" name="submit">Valider</button>
            </form>

            </div>



    </main>


</body>

</html>
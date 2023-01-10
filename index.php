<?php 
    include 'include/User.php';
    session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&family=Rubik&family=Signika&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Accueil</title>
    </head>

    <body class="wall1">
        <?php include 'include/header.php' ?>
        <main class="flex">
            
            <h1>Memory</h1>
            <?php if ($user->isConnected()){ ?>
                <div id="link-jouer">
                    <a href="difficult.php">Jouer</a>
                </div>
            <?php } ?>
        </main>

        <footer></footer>
    </body>

</html>
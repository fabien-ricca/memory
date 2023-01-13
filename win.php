<?php 
    include 'include/User.php';
    include 'include/Card.php';
    include 'include/Game.php';
    include 'include/Score.php';
    session_start(); 

    $score = new Score();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&family=Rubik&family=Signika&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Victoire !</title>
    </head>

    <body class="wall4">
        <?php include 'include/header.php' ?>

        <main class="flex center">
            <section class="flex-column" id="win">
                <h2>!! Félicitation !!</h2>
                <h3>Nombre de coups</h3>
                <p><?= $_SESSION['nbrcoups'] ?></p>
                <h3>Votre score</h3>

                <p><?php 
                    $score->calculScore($_SESSION['difficult'], $_SESSION['nbrcoups']);
                    echo $score->getUserScore(); 
                    $score->pushScore($score->getUserScore());
                ?></p>

                <a href="difficult.php"><button id="replay">Rejouer</button></a>
            </section>
        </main>
    </body>
</html>
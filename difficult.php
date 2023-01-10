<?php 
    include 'include/User.php';
    include 'include/Card.php';
    session_start(); 

    $card = new Card($index = NULL, $idCard = NULL, $state = false);
    $card->difficulty();
    var_dump($_SESSION['cards']);
    header('location: jeu.php');
    
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&family=Rubik&family=Signika&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Memory</title>
    </head>

    <body class="wall3">
        <?php include 'include/header.php' ?>

        <main>
            <div  class="flex-column" id="difficult-container">
                <form method="post" class="flex-column">
                    <input type="submit" name="facile" value="Facile" id="difficult"><br>
                    <input type="submit" name="intermediaire" value="Intermédiaire" id="difficult"><br>
                    <input type="submit" name="difficile" value="Dificile" id="difficult"><br>
                </form>
            </div>
        </main>

        <footer></footer>
    </body>

</html>
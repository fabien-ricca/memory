<?php 
    include 'include/User.php';
    include 'include/Card.php';
    session_start(); 

    
    $nbrcards = 0;


    if(isset($_POST['facile'])){
        $nbrcards = 6;
        echo $nbrcards;
        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        $card->difficulty($nbrcards);
        header('location: jeu.php');
    }

    if(isset($_POST['intermediaire'])){
        $nbrcards = 12;
        echo $nbrcards;
        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        $card->difficulty($nbrcards);
        header('location: jeu.php');
    }

    if(isset($_POST['difficile'])){
        $nbrcards = 24;
        echo $nbrcards;
        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        $card->difficulty($nbrcards);
        header('location: jeu.php');
    }
    
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
                    <input type="submit" name="facile" value="facile" id="difficult"><br>
                    <input type="submit" name="intermediaire" value="intermediaire" id="difficult"><br>
                    <input type="submit" name="difficile" value="difficile" id="difficult"><br>
                </form>
            </div>
        </main>

        <footer></footer>
    </body>

</html>